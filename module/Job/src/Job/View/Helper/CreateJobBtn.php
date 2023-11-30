<?php

namespace Job\View\Helper;

use Laminas\ServiceManager\ServiceManager;
use Laminas\View\Helper\AbstractHelper;
use Laminas\View\Model\ViewModel;

class CreateJobBtn extends AbstractHelper
{
    protected $serviceManager;
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function __invoke()
    {
        $renderer = $this->getServiceManager()->get('ViewRenderer');
        $view = new ViewModel();
        $view->setTemplate('Job/create-job-btn');
        return $renderer->render($view);
    }
}