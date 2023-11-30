<?php

return [
    'plugins' => [
        'meliscore' => [
            'interface' => [
                'melis_dashboardplugin' => [
                    'interface' => [
                        'melisdashboardplugin_section' => [
                            'interface' => [
                                'PostedJobsCounter' => [
                                    'conf' => [
                                        'type' => '/job/interface/PostedJobsCounter',
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'job' => [
            'interface' => [
                'PostedJobsCounter' => [
                    'conf' => [
                        'name' => 'PostedJobsCounter',
                        'melisKey' => 'PostedJobsCounter',
                    ],
                    'datas' => [
                        'plugin_id' => 'PostedJobsCounter',
                        'name' => 'tr_posted_jobs_counter_name',
                        'description' => 'tr_posted_jobs_counter_description',
                        'icon' => 'fa fa-briefcase',
                        'thumbnail' => '',
                        'jscallback' => '',
                        'max_lines' => 8,
                        'height' => 4,
                        'width' => 6,
                        'y-axis' => 0,
                        'x-axis' => 0,
                        'section' => 'Others'
                    ],
                    'forward' => [
                        'module' => 'Job',
                        'plugin' => 'PostedJobsCounter',
                        'function' => 'index',
                        // 'jscallback' => 'onLoad()'
                    ]
                ]
            ]
        ]
    ]
];