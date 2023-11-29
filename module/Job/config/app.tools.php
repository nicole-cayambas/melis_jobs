<?php

return [
    'plugins' => [
        'job' => [
            'tools' => [
                'job_tools' => [
                    'conf' => [
                        'title' => 'Job Tools',
                        'id' => 'id_job_templates',
                    ],
                    'table' => [
                        // table ID
                        'target' => '#tableToolJob',
                        'ajaxUrl' => '/melis/Job/List/getList',
                        'dataFunction' => '',
                        'ajaxCallback' => '',
                        'filters' => [
                            'left' => [
                                'job-tbl-filter-limit' => [
                                    'module' => 'Job',
                                    'controller' => 'List',
                                    'action' => 'render-table-filter-limit',
                                ],
                            ],
                            'center' => [
                                'job-tbl-filter-search' => [
                                    'module' => 'Job',
                                    'controller' => 'List',
                                    'action' => 'render-table-filter-search',
                                ],
                            ],
                            'right' => [
                                'job-tbl-filter-refresh' => [
                                    'module' => 'Job',
                                    'controller' => 'List',
                                    'action' => 'render-table-filter-refresh',
                                ],
                            ],
                        ],
                        'columns' => [
                            'DT_RowId' => [
                                'text' => 'tr_job_input_id',
                                'css' => ['width' => '20%'],
                                'sortable' => true
                            ],
                            'job_title' => [
                                'text' => 'tr_job_input_title',
                                'css' => ['width' => '20%'],
                                'sortable' => true
                            ],
                            'job_desc' => [
                                'text' => 'tr_job_input_description',
                                'css' => ['width' => '20%'],
                                'sortable' => true
                            ],
                            'location' => [
                                'text' => 'tr_job_input_location',
                                'css' => ['width' => '20%'],
                                'sortable' => true
                            ],
                            'posted_at' => [
                                'text' => 'tr_job_input_posted_at',
                                'css' => ['width' => '20%'],
                                'sortable' => true
                            ]
                        ],
                        // define what columns can be used in searching
                        'searchables' => [
                            'id',
                            'job_title',
                            'job_desc',
                            'location',
                        ],
                        'actionButtons' => [
                            'edit' => [
                                'module' => 'Job',
                                'controller' => 'List',
                                'action' => 'render-table-action-edit',
                            ],
                            'delete' => [
                                'module' => 'Job',
                                'controller' => 'List',
                                'action' => 'render-table-action-delete',
                            ],
                        ]
                    ],
                ]
            ]
        ]
    ]
];