<?php

namespace Job\Listener;

use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\ListenerAggregateInterface;
use MelisCore\Listener\MelisGeneralListener;

class JobTableColumnDisplayListener extends MelisGeneralListener implements ListenerAggregateInterface
{
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->attachEventListener(
            $events,
            '*',
            'job_location_display_location',
            function($e){
                $params = $e->getParams();

                $jobRecord = $params['data'];

                $text = $jobRecord['location'];
                if($jobRecord['is_remote']) {
                    $text = "{$text} (Remote)";
                }
                $params['data'] = $text;
            }
        );
    }
}