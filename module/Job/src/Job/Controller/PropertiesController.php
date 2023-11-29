<?php

namespace Job\Controller;

use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use MelisCore\Controller\MelisAbstractActionController;

class PropertiesController extends MelisAbstractActionController
{
    public function renderToolFormAction()
    {
        $view = new ViewModel();
        $form = $this->getForm();

        $id = $this->params()->fromQuery('id', 'add');
        $view->id = $id;

        if ($id != 'add') {
            $jobTable = $this->getServiceManager()->get('JobTable');
            $data = $jobTable->getEntryById($id)->current();
            $form->bind($data);
        }

        $view->form = $form;

        return $view;
    }

    private function getForm()
    {
        $melisCoreConfig = $this->getServiceManager()->get('MelisCoreConfig');
        $appConfigForm = $melisCoreConfig->getFormMergedAndOrdered('job/tools/job_tools/forms/job_property_form', 'job_property_form');

        // Factoring Inquiry event and pass to view
        $factory = new \Laminas\Form\Factory();
        $formElements = $this->getServiceManager()->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $form = $factory->createForm($appConfigForm);

        return $form;
    }


    public function saveAction()
    {
        $translator = $this->getServiceManager()->get('translator');

        $success = 0;
        $textTitle = $translator->translate('tr_job_title');
        $textMessage = $translator->translate('tr_job_unable_to_save');
        $errors = [];

        $request = $this->getServiceManager()->get('request');
        $id = null;
        $entryTitle = null;

        if ($request->isPost()) {

            // $this->getEventManager()->trigger('inquiry_properties_save_start', $this, $request);
            $jobService = $this->getServiceManager()->get('JobService');
            $saveResult = $jobService->saveItem($request->getPost()->toArray(), $request->getPost('id'));

            if (!empty($saveResult['errors']))
                $errors = $saveResult['errors'];
            if (!empty($saveResult['data']))
                $data = $saveResult['data'];

            if (empty($errors)) {
                $id = $saveResult;
                $success = 1;

                $entryTitle = $translator->translate('tr_job_common_entry_id') . ': ' . $id;

                if ($request->getPost()['id'] == 'add')
                    $textMessage = $translator->translate('tr_job_create_success');
                else
                    $textMessage = $translator->translate('tr_job_save_success');
            }
        }

        $response = [
            'success' => $success,
            'textTitle' => $textTitle,
            'textMessage' => $textMessage,
            'errors' => $errors,
            'typeCode' => 'JOB_MELIS_ADD'
        ];


        if (!is_null($id)) {
            $response['itemId'] = $id;
            $response['entryTitle'] = $entryTitle;
        }

        $this->getEventManager()->trigger('job_properties_save_end', $this, $response);

        return new JsonModel($response);
    }
}