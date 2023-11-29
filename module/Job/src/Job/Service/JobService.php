<?php

namespace Job\Service;
use MelisCore\Service\MelisGeneralService;

class JobService extends MelisGeneralService
{
    public function getList($start = null, $limit = null, $searchKeys = [], $searchValue = null, $orderKey = null, $order = 'ASC', $langId = 1, $count = false)
    {
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $arrayParameters = $this->sendEvent('job_service_get_list_start', $arrayParameters);

        $inquiryTable = $this->getServiceManager()->get('JobTable');
        $list = $inquiryTable->getList(
            $arrayParameters['start'],
            $arrayParameters['limit'],
            $arrayParameters['searchKeys'],
            $arrayParameters['searchValue'],
            $arrayParameters['orderKey'],
            $arrayParameters['order'],
            $arrayParameters['langId'],
            $arrayParameters['count']
        );

        $arrayParameters['results'] = $list;
        $arrayParameters = $this->sendEvent('job_service_get_list_end', $arrayParameters);
        return $arrayParameters['results'];
    }
}