<?php

/**
 * Melis Technology (http://www.melistechnology.com]
 *
 * @copyright Copyright (c] 2015 Melis Technology (http://www.melistechnology.com]
 *
 */

return [
    'router' => [
        'routes' => [
            'melis-backoffice' => [
                'child_routes' => [
                    'application-Joblocation' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => 'Joblocation',
                            'defaults' => [
                                '__NAMESPACE__' => 'Joblocation\Controller',
                            ],
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
                                    'defaults' => [
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => [
            // Service
            'JoblocationService' => \Joblocation\Service\JoblocationService::class,
            // Table
            'JoblocationTable' => \Joblocation\Model\Tables\JoblocationTable::class
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Joblocation\Controller\List' => \Joblocation\Controller\ListController::class,
            'Joblocation\Controller\Properties' => \Joblocation\Controller\PropertiesController::class,
        ],
    ],
    'form_elements' => [
        'factories' => [
            'MelisCheckbox' => \Joblocation\Form\Factory\MelisCheckboxFactory::class,
        ]
    ],
    'view_manager' => [
        'template_map' => [
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
