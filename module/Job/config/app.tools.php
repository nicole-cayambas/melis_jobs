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
                        'ajaxUrl' => '/melis/Job/JobsList/getList',
                        'dataFunction' => '',
                        'ajaxCallback' => '',
                        'filters' => [
                            'left' => [
                                'job-tbl-filter-limit' => [
                                    'module' => 'Job',
                                    'controller' => 'JobsList',
                                    'action' => 'render-table-filter-limit',
                                ],
                            ],
                            'center' => [
                                'job-tbl-filter-search' => [
                                    'module' => 'Job',
                                    'controller' => 'JobsList',
                                    'action' => 'render-table-filter-search',
                                ],
                            ],
                            'right' => [
                                'job-tbl-filter-refresh' => [
                                    'module' => 'Job',
                                    'controller' => 'JobsList',
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
                            ],
                            'is_posted' => [
                                'text' => 'tr_job_input_is_posted',
                                'css' => ['width' => '20%'],
                                'sortable' => true,
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
                                'controller' => 'JobsList',
                                'action' => 'render-table-action-edit',
                            ],
                            'delete' => [
                                'module' => 'Job',
                                'controller' => 'JobsList',
                                'action' => 'render-table-action-delete',
                            ],
                            // 'post' => [
                            //     'module' => 'Job',
                            //     'controller' => 'JobsList',
                            //     'action' => 'render-table-action-post',
                            // ],
                        ]
                    ],
                    'forms' => [
                        'job_property_form' => [
                            'attributes' => [
                                'name' => 'jobForm',
                                'id' => 'jobForm',
                                'method' => 'POST',
                                'action' => '',
                            ],
                            'hyrdator' => 'Laminas\Hydrator\ArraySerializableHydrator',
                            'elements' => [
                                [
                                    'spec' => [
                                        'name' => 'id',
                                        'type' => 'MelisText',
                                        'options' => [
                                            'label' => 'tr_job_input_id',
                                            'tooltip' => 'tr_job_input_id_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'id',
                                            'class' => 'form-control',
                                            'required' => false,
                                            'disabled' => 'disabled'
                                        ],
                                    ]
                                ],
                                [
                                    'spec' => [
                                        'name' => 'job_title',
                                        'type' => 'MelisText',
                                        'options' => [
                                            'label' => 'tr_job_input_title',
                                            'tooltip' => 'tr_job_input_title_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'job_title',
                                            'class' => 'form-control',
                                            'required' => true,
                                        ],
                                    ]
                                ],
                                [
                                    'spec' => [
                                        'name' => 'job_desc',
                                        'type' => 'MelisText',
                                        'options' => [
                                            'label' => 'tr_job_input_description',
                                            'tooltip' => 'tr_job_input_description_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'job_desc',
                                            'class' => 'form-control',
                                            'required' => false,
                                        ],
                                    ]
                                ],
                                [
                                    'spec' => [
                                        'name' => 'location',
                                        'type' => 'JobLocationSelect',
                                        'options' => [
                                            'label' => 'tr_job_input_location',
                                            'tooltip' => 'tr_job_input_location_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'location',
                                            'class' => 'form-control',
                                            'required' => false,
                                        ],
                                    ]
                                ],
                                // [
                                //     'spec' => [
                                //         'name' => 'is_posted',
                                //         'type' => 'JobPostedStatusSwitch',
                                //         'options' => [
                                //             'label' => 'tr_job_input_is_posted',
                                //             'tooltip' => 'tr_job_input_is_posted_tooltip',
                                //         ],
                                //         'attributes' => [
                                //             'id' => 'is_posted',
                                //             'class' => 'form-control',
                                //             'required' => false,
                                //         ],
                                //     ]
                                // ],
                            ]
                        ]
                    ]
                ],
                'joblocation_tools' => [
                    'conf' => [
                        'title' => 'tr_joblocation_templates',
                        'id' => 'id_joblocation_templates',
                    ],
                    'table' => [
                        // table ID
                        'target' => '#tableToolJoblocation',
                        'ajaxUrl' => '/melis/Job/JobLocationList/getList',
                        'dataFunction' => '',
                        'ajaxCallback' => '',
                        'filters' => [
                            'left' => [
                                'joblocation-tbl-filter-limit' => [
                                    'module' => 'Job',
                                    'controller' => 'JobLocationList',
                                    'action' => 'render-table-filter-limit',
                                ],
                            ],
                            'center' => [
                                'joblocation-tbl-filter-search' => [
                                    'module' => 'Job',
                                    'controller' => 'JobLocationList',
                                    'action' => 'render-table-filter-search',
                                ],
                            ],
                            'right' => [
                                'joblocation-tbl-filter-refresh' => [
                                    'module' => 'Job',
                                    'controller' => 'JobLocationList',
                                    'action' => 'render-table-filter-refresh',
                                ],
                            ],
                        ],
                        'columns' => [
                            'DT_RowId' => [
                                'text' => 'tr_joblocation_input_id',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ],
                            'location' => [
                                'text' => 'tr_joblocation_input_location',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ],
                            'is_remote' => [
                                'text' => 'tr_joblocation_input_is_remote',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ],
                            'created_at' => [
                                'text' => 'tr_joblocation_input_created_at',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ],
                            'updated_at' => [
                                'text' => 'tr_joblocation_input_updated_at',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ],
                            'created_by' => [
                                'text' => 'tr_joblocation_input_created_by',
                                'css' => ['width' => '17%'],
                                'sortable' => true
                            ]
                        ],
                        // define what columns can be used in searching
                        'searchables' => [
                            'id',
                            'location',
                            'is_remote',
                            'created_at',
                            'updated_at',
                            'created_by'
                        ],
                        'actionButtons' => [
                            'edit' => [
                                'module' => 'Job',
                                'controller' => 'JobLocationList',
                                'action' => 'render-table-action-edit',
                            ],
                            'delete' => [
                                'module' => 'Job',
                                'controller' => 'JobLocationList',
                                'action' => 'render-table-action-delete',
                            ],
                        ]
                    ],
                    'forms' => [
                        'joblocation_property_form' => [
                            'attributes' => [
                                'name' => 'joblocationForm',
                                'id' => 'joblocationForm',
                                'method' => 'POST',
                                'action' => '',
                            ],
                            'hydrator' => 'Laminas\Hydrator\ArraySerializableHydrator',
                            'elements' => [
                                [
                                    'spec' => [
                                        'name' => 'id',
                                        'type' => 'MelisText',
                                        'options' => [
                                            'label' => 'tr_joblocation_input_id',
                                            'tooltip' => 'tr_joblocation_input_id_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'id',
                                            'class' => 'form-control',
                                            'required' => false,
                                            'disabled' => 'disabled'
                                        ],
                                    ],
                                ],
                                [
                                    'spec' => [
                                        'name' => 'location',
                                        'type' => 'MelisText',
                                        'options' => [
                                            'label' => 'tr_joblocation_input_location',
                                            'tooltip' => 'tr_joblocation_input_location_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'location',
                                            'class' => 'form-control',
                                            'required' => true,

                                        ],
                                    ],
                                ],
                                [
                                    'spec' => [
                                        'name' => 'is_remote',
                                        'type' => 'MelisCheckbox',
                                        'options' => [
                                            'label' => 'tr_joblocation_input_is_remote',
                                            'tooltip' => 'tr_joblocation_input_is_remote_tooltip',
                                        ],
                                        'attributes' => [
                                            'id' => 'is_remote',
                                            'class' => 'form-control',
                                            'required' => true,
                                        ],
                                    ],
                                ]
                            ],
                            'input_filter' => [
                                'location' => [
                                    'name' => 'location',
                                    'required' => true,
                                    'validators' => [
                                        [
                                            'name' => 'NotEmpty',
                                            'options' => [
                                                'messages' => [
                                                    \Laminas\Validator\NotEmpty::IS_EMPTY => 'tr_joblocation_value_must_not_is_empty',
                                                ],
                                            ],
                                        ]
                                    ],
                                    'filters' => [
                                        ['name' => 'StripTags'],
                                        ['name' => 'StringTrim'],
                                    ],
                                ]
                            ]
                        ],

                    ]
                ]
            ]
        ]
    ]
];