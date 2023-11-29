<?php

namespace Job\Service;

use MelisCore\Service\MelisGeneralService;

class JobService extends MelisGeneralService
{
    public function getList($start = null, $limit = null, $searchKeys = [], $searchValue = null, $orderKey = null, $order = 'ASC', $langId = 1, $count = false)
    {
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $arrayParameters = $this->sendEvent('job_service_get_list_start', $arrayParameters);

        $jobTable = $this->getServiceManager()->get('JobTable');
        $list = $jobTable->getList(
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

    public function saveItem($data, $id = null)
    {
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $arrayParameters = $this->sendEvent('job_service_save_item_start', $arrayParameters);

        if ($data) {
            $jobTable = $this->getServiceManager()->get('JobTable');
            $res = $jobTable->save($arrayParameters['data'], $arrayParameters['id']);
        }
        $arrayParameters['result'] = $res;
        $arrayParameters = $this->sendEvent('job_service_save_item_end', $arrayParameters);

        return $arrayParameters['result'];
    }

    public function deleteItem($id)
    {
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $arrayParameters = $this->sendEvent('job_service_delete_item_start', $arrayParameters);

        $jobTable = $this->getServiceManager()->get('JobTable');
        $res = $jobTable->deleteById($arrayParameters['id']);

        $arrayParameters['result'] = $res;
        $arrayParameters = $this->sendEvent('job_service_delete_item_end', $arrayParameters);
        return $arrayParameters['result'];
    }
}