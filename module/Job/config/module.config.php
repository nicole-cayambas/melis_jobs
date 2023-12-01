<?php

return [
    'router' => [
        'routes' => [
            'melis-backoffice' => [
                'child_routes' => [
                    'application-Job' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => 'Job',
                            'defaults' => [
                                '__NAMESPACE__' => 'Job\Controller'
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'default' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => '/[:controller[/:action]]',
                                    'constraints' => [
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ],
                                    'defaults' => [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controller_plugins' => [
        'invokables' => [
            // Dashboard
            'PostedJobsCounter' => \Job\Controller\Plugin\Dashboard\PostedJobsCounter::class,
            // Site
            'PopularJobs' => \Job\Controller\Plugin\PopularJobs::class
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Job\Controller\List' => Job\Controller\ListController::class,
            'Job\Controller\Properties' => Job\Controller\PropertiesController::class,
        ]
    ],
    'view_helpers' => [
        'aliases' => [
            'TableCellStatusHelper' => Job\View\Helper\TableCellStatusHelper::class,
            'CreateJobBtn' => Job\View\Helper\CreateJobBtn::class
        ]
    ],
    'service_manager' => [
        'aliases' => [
            // Service
            'JobService' => \Job\Service\JobService::class,
            // Table
            'JobTable' => \Job\Model\Tables\JobTable::class
        ]
    ],
    'view_manager' => [
        'doctype' => 'HTML5',
        'template_map' => [
            'Job/counter' => __DIR__ . '/../view/job/plugins/dashboard/posted-jobs-counter.phtml',
            'Job/create-job-btn' => __DIR__ . '/../view/job/helper/create-job-btn.phtml',

            'Job/popular-slider' => __DIR__ . '/../view/job/plugins/popular-slider.phtml',
            'Job/plugin/modal/modal-template-form' => __DIR__ . '/../view/job/plugins/modal/modal-template-form.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
];