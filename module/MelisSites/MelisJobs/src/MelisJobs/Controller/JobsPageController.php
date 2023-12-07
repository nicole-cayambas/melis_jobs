<?php

namespace MelisJobs\Controller;

use Laminas\View\Model\ViewModel;

class JobsPageController extends BaseController
{
    public function indexAction()
    {
    	$view = new ViewModel();
    	
    	$view->setVariable('idPage', $this->idPage);
    	$view->setVariable('renderType', $this->renderType);
    	$view->setVariable('renderMode', $this->renderMode);
    	
    	return $view;
    }
}