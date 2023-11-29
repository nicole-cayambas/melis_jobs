<?php

namespace Job\Controller;

use DummyPDOQuerySplitter;
use Laminas\Session\Container;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use MelisCore\Controller\MelisAbstractActionController;

class ListController extends MelisAbstractActionController
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
        return $view;
    }

    public function getListAction()
    {
        $melisTool = $this->getServiceManager()->get('MelisCoreTool');
        $melisTool->setMelisToolKey('job', 'job_tools');

        $inquiryService = $this->getServiceManager()->get('JobService');

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

            $tableData = $inquiryService->getList($start, $length, $melisTool->getSearchableColumns(), $search, $selCol, $sortOrder, $langId)->toArray();
            $dataCount = $inquiryService->getList(null, null, $melisTool->getSearchableColumns(), $search, null, 'ASC', $langId, true)->current();
        }

        return new JsonModel([
            'draw' => (int) $draw,
            'recordsTotal' => count($tableData),
            'recordsFiltered' => $dataCount->totalRecords,
            'data' => $tableData,
        ]);
    }
}