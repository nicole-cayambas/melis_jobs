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
    'controllers' => [
        'invokables' => [
            'Job\Controller\List' => Job\Controller\ListController::class
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
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
];