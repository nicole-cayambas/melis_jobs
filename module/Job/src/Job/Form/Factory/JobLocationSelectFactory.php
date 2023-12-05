<?php 

namespace Job\Form\Factory;

use Laminas\ServiceManager\ServiceManager;
use MelisCore\Form\Factory\MelisSelectFactory; 

class JobLocationSelectFactory extends MelisSelectFactory
{

    public function loadValueOptions(ServiceManager $serviceManager)
    {
        $nicolenoteService = $serviceManager->get('JoblocationService');
        $options = $nicolenoteService->getList(0, 50);

        $finalOptions = [];
        foreach($options AS $option)
        {
            $finalOptions[$option->id] = $option->location;
        }
        return $finalOptions;
    }
}