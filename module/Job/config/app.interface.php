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
                                        ]
                                    ],
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
                        'controller' => 'List',
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
                                'controller' => 'List',
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
                                'controller' => 'List',
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
                                        'controller' => 'List',
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
                                                'controller' => 'Properties',
                                                'action' => 'render-tool-form',
                                            ]
                                        ]
                                    ]
                                ],
                            ]
                        ],
                    ]
                ]
            ]
        ]
    ]
];