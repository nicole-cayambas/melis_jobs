<?php

return [
    'plugins' => [
        'job' => [
            'plugins' => [
                'PopularJobs' => [
                    'front' => [
                        'template_path' => [
                            'Job/popular-slider'
                        ],
                        'id' => 'popularjobs',
                        'site_id' => null,
                        // 'pagination' => [
                        //     'current' => 1,
                        //     'nbPerPage' => 9,
                        //     'nbPageBeforeAfter' => 0
                        // ],
                        // 'filter' => [
                        //     'column' => 'label',
                        //     'order' => 'DESC',
                        //     'date_min' => null,
                        //     'date_max' => null,
                        //     'search' => '',
                        // ],
                        'files' => [
                            'css' => [
                                '/Job/plugins/css/popular-jobs.css',
                            ],
                            'js' => []
                        ],
                    ],
                    'melis' => [
                        'name' => 'tr_job_popular_jobs_plugin_name',
                        'section' => 'MelisCms',
                        'thumbnail' => '',
                        'description' => 'tr_job_popular_jobs_plugin_description',
                        'modal_form' => [
                            'popular_jobs_plugin_template_form' => [
                                'tab_title' => 'tr_popular_jobs_plugin_tab_properties',
                                'tab_icon' => 'fa fa-cog',
                                'tab_form_layout' => 'Job/plugin/modal/modal-template-form',
                                'attributes' => [
                                    'name' => 'popular_jobs_plugin_template_form',
                                    'id' => 'id_popular_jobs_plugin_template_form',
                                    'method' => '',
                                    'action' => '',
                                ],
                                'elements' => [
                                    [
                                        'spec' => [
                                            'name' => 'template_path',
                                            'type' => 'MelisEnginePluginTemplateSelect',
                                            'options' => [
                                                'label' => 'tr_melis_Plugins_Template',
                                                'tooltip' => 'tr_melis_Plugins_Template tooltip',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                            ],
                                            'attributes' => [
                                                'id' => 'id_page_tpl_id',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                            ],
                                        ],
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