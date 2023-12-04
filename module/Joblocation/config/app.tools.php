<?php

/**
 * Melis Technology (http://www.melistechnology.com]
 *
 * @copyright Copyright (c] 2015 Melis Technology (http://www.melistechnology.com]
 *
 */

return [
    'plugins' => [
        'joblocation' => [
            'tools' => [
                'joblocation_tools' => [
                    'conf' => [
                        'title' => 'tr_joblocation_templates',
                        'id' => 'id_joblocation_templates',
                    ],
                    'table' => [
                        // table ID
                        'target' => '#tableToolJoblocation',
                        'ajaxUrl' => '/melis/Joblocation/List/getList',
                        'dataFunction' => '',
                        'ajaxCallback' => '',
                        'filters' => [
                            'left' => [
                                'joblocation-tbl-filter-limit' => [
                                    'module' => 'Joblocation',
                                    'controller' => 'List',
                                    'action' => 'render-table-filter-limit',
                                ],
                            ],
                            'center' => [
                                'joblocation-tbl-filter-search' => [
                                    'module' => 'Joblocation',
                                    'controller' => 'List',
                                    'action' => 'render-table-filter-search',
                                ],
                            ],
                            'right' => [
                                'joblocation-tbl-filter-refresh' => [
                                    'module' => 'Joblocation',
                                    'controller' => 'List',
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
                                  'module' => 'Joblocation',
                                  'controller' => 'List',
                                  'action' => 'render-table-action-edit',
                            ],
                            'delete' => [
                                'module' => 'Joblocation',
                                'controller' => 'List',
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
                            'hydrator'  => 'Laminas\Hydrator\ArraySerializableHydrator',
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
                                    'name'     => 'location',
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
                                    'filters'  => [
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