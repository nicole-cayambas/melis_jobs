<?php

return [
    'plugins' => [
        'meliscore' => [
            'interface' => [
                'meliscore_leftmenu' => [
                    'interface' => [
                        'meliscustom_toolstree_section' => [
                            'interface' => [
                                'job_tools_section' => [
                                    'interface' => [
                                        'list' => [
                                            'conf' => [
                                                'type' => 'job/interface/job_tool_list'
                                            ]
                                        ],
                                    ],
                                ],
                                'joblocation_tools_section' => [
                                    'interface' => [
                                        'list' => [
                                            'conf' => [
                                                'type' => 'job/interface/joblocation_tool'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'job' => [
            'conf' => [
                'id' => 'id_job_module',
                'name' => 'tr_job_title',
                'rightsDisplay' => 'none'
            ],
            'ressources' => [
                'js' => [
                    '/Job/js/tool.js'
                ],
                'css' => [

                ],
                'build' => [
                    'disable_bundle' => true,
                    'css' => [
                        '/NicoleBookmark/build/css/bundle.css',
                    ],
                    'js' => [
                        '/NicoleBookmark/build/js/bundle.js',
                    ]
                ]
            ],
            'interface' => [
                'job_tool_list' => [
                    'conf' => [
                        'id' => 'id_job_tool_list',
                        'melisKey' => 'job_tool_list',
                        'name' => 'tr_job_tool_title',
                        'icon' => 'fa fa-briefcase',
                    ],
                    'forward' => [
                        'module' => 'Job',
                        'controller' => 'JobsList',
                        'action' => 'render-tool-table',
                    ],
                    'interface' => [
                        'job_tool_list_header' => [
                            'conf' => [
                                'id' => 'id_job_tool_header',
                                'melisKey' => 'job_tool_list_header',
                                'name' => 'job_tool_list_header',
                            ],
                            'forward' => [
                                'module' => 'Job',
                                'controller' => 'JobsList',
                                'action' => 'render-tool-table-header',
                            ]
                        ],
                        'job_tool_list_table' => [
                            'conf' => [
                                'id' => 'id_job_tool_table',
                                'melisKey' => 'job_tool_list_table',
                                'name' => 'job_tool_list_table',
                            ],
                            'forward' => [
                                'module' => 'Job',
                                'controller' => 'JobsList',
                                'action' => 'render-tool-table-content',
                            ],
                            'interface' => [
                                'job_tool_list_modal' => [
                                    'conf' => [
                                        'id' => 'id_job_tool_modal',
                                        'melisKey' => 'job_tool_list_modal',
                                        'name' => 'job_tool_list_modal',
                                    ],
                                    'forward' => [
                                        'module' => 'Job',
                                        'controller' => 'JobsList',
                                        'action' => 'render-table-modal',
                                    ],
                                    'interface' => [
                                        'job_tool_list_form' => [
                                            'conf' => [
                                                'id' => 'id_job_tool_form',
                                                'melisKey' => 'job_tool_list_form',
                                                'name' => 'tr_job_tool_list_form_properties',
                                                'icon' => 'fa fa-user'
                                            ],
                                            'forward' => [
                                                'module' => 'Job',
                                                'controller' => 'JobsProperties',
                                                'action' => 'render-tool-form',
                                            ]
                                        ]
                                    ]
                                ],
                            ]
                        ],
                    ]
                ],
                'joblocation_tool' => [
                    'conf' => [
                        'id' => 'id_joblocation_tool',
                        'melisKey' => 'joblocation_tool',
                        'name' => 'tr_joblocation_title',
                        'icon' => 'fa fa-puzzle-piece',
                    ],
                    'forward' => [
                        'module' => 'Job',
                        'controller' => 'JobLocationList',
                        'action' => 'render-tool',
                        'jscallback' => '',
                        'jsdatas' => []
                    ],
                    'interface' => [
                        'joblocation_header' => [
                            'conf' => [
                                'id' => 'id_joblocation_header',
                                'melisKey' => 'joblocation_header',
                                'name' => 'tr_joblocation_header',
                            ],
                            'forward' => [
                                'module' => 'Job',
                                'controller' => 'JobLocationList',
                                'action' => 'render-tool-header',
                                'jscallback' => '',
                                'jsdatas' => []
                            ],
                        ],
                        'joblocation_content' => [
                            'conf' => [
                                'id' => 'id_joblocation_content',
                                'melisKey' => 'joblocation_content',
                                'name' => 'tr_joblocation_content',
                            ],
                            'forward' => [
                                'module' => 'Job',
                                'controller' => 'JobLocationList',
                                'action' => 'render-tool-content',
                                'jscallback' => '',
                                'jsdatas' => []
                            ],
                            'interface' => [
                                'joblocation_modal' => [
                                    'conf' => [
                                        'id' => 'id_joblocation_modal',
                                        'melisKey' => 'joblocation_modal',
                                        'name' => 'tr_joblocation_modal',
                                    ],
                                    'forward' => [
                                        'module' => 'Job',
                                        'controller' => 'JobLocationList',
                                        'action' => 'render-modal-form',
                                        'jscallback' => '',
                                        'jsdatas' => []
                                    ],
                                    'interface' => [
                                        'joblocation_properties_form' => [
                                            'conf' => [
                                                'id' => 'id_joblocation_properties_form',
                                                'melisKey' => 'joblocation_properties_form',
                                                'name' => 'tr_joblocation_properties',
                                                'icon' => 'cogwheel'
                                            ],
                                            'forward' => [
                                                'module' => 'Job',
                                                'controller' => 'JobLocationProperties',
                                                'action' => 'render-properties-form',
                                                'jscallback' => '',
                                                'jsdatas' => []
                                            ]
                                        ],
                                        #TCTOOLINTERFACE
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];