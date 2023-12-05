<?php

namespace Job\Controller\Plugin;

use MelisEngine\Controller\Plugin\MelisTemplatingPlugin;

class PopularJobs extends MelisTemplatingPlugin
{
    public function __construct($updatesPluginConfig = [])
    {
        $this->configPluginKey = 'job';
        $this->pluginXmlDbKey = 'popularjobs';
        parent::__construct($updatesPluginConfig);
    }

    public function front()
    {
        /** @var \Job\Service\JobService $bookmarkSrv */
        $jobSrv = $this->getServiceManager()->get('JobService');
        $popularJobs = $jobSrv->getList(null, null, [], null, null, 'ASC', 1, false, ['is_posted', 1])->toArray();

        $finalPopularJobs = [];
        foreach($popularJobs AS $job) {
            $temp = $job;
            $locationText = $job['location'];
            if($job['is_remote']) {
                $locationText .= ' (Remote)';
            }
            $temp['location'] = $locationText;
            $finalPopularJobs[] = $temp;
        }

        return [
            'popularJobs' => $finalPopularJobs,
            'renderMode' => $this->renderMode,
            'previewMode' => $this->previewMode,
        ];
    }
}