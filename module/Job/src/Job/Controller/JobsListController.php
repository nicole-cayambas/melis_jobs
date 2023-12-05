<?php

namespace Job\Controller;

use DummyPDOQuerySplitter;
use Job\View\Helper\TableCellStatusHelper;
use Laminas\Session\Container;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use MelisCore\Controller\MelisAbstractActionController;

class JobsListController extends MelisAbstractActionController
{
    public function renderToolTableAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function renderToolTableHeaderAction()
    {
        $view = new ViewModel();
        return $view;
    }

    public function renderToolTableContentAction()
    {
        $view = new ViewModel();

        $melisTool = $this->getServiceManager()->get('MelisCoreTool');
        $melisTool->setMelisToolKey('job', 'job_tools');

        $columns = $melisTool->getColumns();
        $columns['actions'] = ['text' => 'Actions'];

        $view->tableColumns = $columns;
        $view->toolTable = $melisTool->getDataTableConfiguration('#jobTableContent', true, false, ['order' => [[0, 'desc']]]);

        return $view;
    }

    public function renderTableActionEditAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function renderTableActionDeleteAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function renderTableFilterLimitAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function renderTableFilterSearchAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function renderTableFilterRefreshAction()
    {
        $view = new ViewModel();
        return $view;
    }

    public function renderTableModalAction()
    {
        $view = new ViewModel();
        $view->id = $this->params()->fromQuery('id', 'add');
        return $view;
    }

    public function getListAction()
    {
        $melisTool = $this->getServiceManager()->get('MelisCoreTool');
        $melisTool->setMelisToolKey('job', 'job_tools');

        $jobService = $this->getServiceManager()->get('JobService');

        $draw = 0;
        $dataCount = 0;
        $tableData = [];

        if ($this->getRequest()->isPost()) {

            // Get the locale used from meliscore session
            $container = new Container('meliscore');
            $langId = $container['melis-lang-id'];

            $draw = $this->getRequest()->getPost('draw');

            $start = $this->getRequest()->getPost('start');
            $length = $this->getRequest()->getPost('length');

            $search = $this->getRequest()->getPost('search');
            $search = $search['value'];

            $selCol = $this->getRequest()->getPost('order');
            $colId = array_keys($melisTool->getColumns());
            $selCol = $colId[$selCol[0]['column']];

            $sortOrder = $this->getRequest()->getPost('order');
            $sortOrder = $sortOrder[0]['dir'];

            $tableData = $jobService->getList($start, $length, $melisTool->getSearchableColumns(), $search, $selCol, $sortOrder, $langId)->toArray();
            $dataCount = $jobService->getList(null, null, $melisTool->getSearchableColumns(), $search, null, 'ASC', $langId, true)->current();

            $coreSrv = $this->getServiceManager()->get('MelisGeneralService');

            $finalTableData = [];
            $statusHelper = new TableCellStatusHelper();
            foreach ($tableData as $datum) {
                $temp = $datum;
                $statusColor = $datum['is_posted'] == 1 ? TableCellStatusHelper::SUCCESS : TableCellStatusHelper::ERROR;
                $statusText = $datum['is_posted'] == 1 ? 'Yes' : 'No';
                $temp['is_posted'] = $statusHelper->renderCell($datum['id'], $statusText, 'outlined', $statusColor);
                $temp['location'] = $coreSrv->sendEvent('job_location_display_location', ['data' => $datum])['data'];
                $finalTableData[] = $temp;
            }
        }

        return new JsonModel([
            'draw' => (int) $draw,
            'recordsTotal' => count($tableData),
            'recordsFiltered' => $dataCount->totalRecords,
            'data' => $finalTableData,
        ]);
    }

    public function deleteItemAction()
    {
        $jobService = $this->getServiceManager()->get('JobService');
        try {
            $jobService->deleteItem($this->params()->fromQuery('id'));
            return new JsonModel([
                'success' => true,
                'textTitle' => 'tr_job_delete_item',
                'textMessage' => 'tr_job_delete_success',
            ]);
        } catch (\Throwable $th) {
            return new JsonModel([
                'success' => false,
                'textTitle' => 'tr_job_delete_item',
                'textMessage' => $th->getMessage(),
            ]);
        }
    }

    public function togglePostItemAction()
    {
        $jobService = $this->getServiceManager()->get('JobService');
        try {
            $jobService->togglePostItem($this->params()->fromQuery('id'));
            return new JsonModel([
                'success' => true,
                'textTitle' => 'tr_job_post_item',
                'textMessage' => 'tr_job_post_success',
            ]);
        } catch (\Throwable $th) {
            return new JsonModel([
                'success' => false,
                'textTitle' => 'tr_job_post_item',
                'textMessage' => $th->getMessage(),
            ]);
        }
    }
}