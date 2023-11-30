<?php

namespace Job\Controller\Plugin\Dashboard;

use Laminas\View\Model\ViewModel;
use MelisCore\Controller\DashboardPlugins\MelisCoreDashboardTemplatingPlugin;

class PostedJobsCounter extends MelisCoreDashboardTemplatingPlugin
{
    public function __construct()
    {
        $this->pluginModule = 'job';
        parent::__construct();
    }

    public function index()
    {
        $dashboardPluginsService = $this->getServiceManager()->get('MelisCoreDashboardPluginsService');
        //get the class name to make it as a key to the plugin
        $path = explode('\\', __CLASS__);
        $className = array_pop($path);
        $isAccessible = $dashboardPluginsService->canAccess($className);

        $jService = $this->getServiceManager()->get('JobService');
        $count = $jService->getCount();
        
        $view = new ViewModel();
        $view->setTemplate('Job/counter');
        $view->isAccessible = $isAccessible;
        $view->count = $count;
        return $view;
    }
}