<?php

namespace Job;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\Session\Container;
use Laminas\Stdlib\ArrayUtils;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $this->createTranslations($e);

        $sm = $e->getApplication()->getServiceManager();
        $routeMatch = $sm->get('router')->match($sm->get('request'));

        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function ($e) {
            dump($e);
        });
        $eventManager->attach(MvcEvent::EVENT_RENDER_ERROR, function ($e) {
            dump($e);
        });
        
        if (!empty($routeMatch)) {
            $routeName = $routeMatch->getMatchedRouteName();
            $module = explode('/', $routeName);

            if (!empty($module[0]))
                if ($module[0] == 'melis-backoffice') {
                    // attach listeners for Melis
                }
        }
        
    }

    public function getConfig()
    {
        $config = [];
        $configFiles = [
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/app.interface.php',
            include __DIR__ . '/config/app.tools.php',
            include __DIR__ . '/config/plugins/dashboard/PostedJobsCounter.config.php',
            include __DIR__ . '/config/plugins/PopularJobs.config.php',
            include __DIR__ . '/config/plugins/dashboard/PopularJobsChart.config.php',
        ];

        foreach ($configFiles as $file) {
            $config = ArrayUtils::merge($config, $file);
        }

        return $config;
    }

    public function createTranslations($e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $translator = $sm->get('translator');

        // Get the locale used from meliscore session
        $container = new Container('meliscore');
        $locale = $container['melis-lang-locale'];

        $locale = is_null($locale) ? 'en_EN' : $locale;
        // Load files

        if (!empty($locale)) {
            $translationType = [
                'interface'
            ];

            $translationList = [];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../module/MelisModuleConfig/config/translation.list.php')) {
                $translationList = include 'module/MelisModuleConfig/config/translation.list.php';
            }

            foreach ($translationType as $type) {

                $transPath = '';
                $moduleTrans = __NAMESPACE__ . "/$locale.$type.php";

                if (in_array($moduleTrans, $translationList)) {
                    $transPath = "module/MelisModuleConfig/languages/" . $moduleTrans;
                }

                if (empty($transPath)) {

                    // if translation is not found, use melis default translations
                    $defaultLocale = (file_exists(__DIR__ . "/language/$locale.$type.php")) ? $locale : "en_EN";
                    $transPath = __DIR__ . "/language/$defaultLocale.$type.php";
                }

                $translator->addTranslationFile('phparray', $transPath);
            }
        }
    }

    public function getAutoloaderConfig()
    {
        return [
            'Laminas\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ]
            ]
        ];
    }
}