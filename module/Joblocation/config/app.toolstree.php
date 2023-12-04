<?php

/**
 * Melis Technology (http://www.melistechnology.com]
 *
 * @copyright Copyright (c] 2015 Melis Technology (http://www.melistechnology.com]
 *
 */

return [
    'plugins' => [
        'meliscore' => [
            'interface' => [
                'meliscore_leftmenu' => [
                    'interface' => [
                        'meliscustom_toolstree_section' => [
                            'interface' => [
                                'joblocation_conf' => [
                                    'conf' => [
                                        'id' => 'id_joblocation_leftmenu',
                                        'melisKey' => 'joblocation_leftmenu',
                                        'name' => 'tr_joblocation_title',
                                        'icon' => 'fa fa-puzzle-piece',
                                    ],
                                    'interface' => [
                                        'joblocation_tool' => [
                                            'conf' => [
                                                'id' => 'id_joblocation_tool',
                                                'melisKey' => 'joblocation_tool',
                                                'name' => 'tr_joblocation_title',
                                                'icon' => 'fa fa-puzzle-piece',
                                            ],
                                            'forward' => [
                                                'module' => 'Joblocation',
                                                'controller' => 'List',
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
                                                        'module' => 'Joblocation',
                                                        'controller' => 'List',
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
                                                        'module' => 'Joblocation',
                                                        'controller' => 'List',
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
                                                                'module' => 'Joblocation',
                                                                'controller' => 'List',
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
                                                                        'module' => 'Joblocation',
                                                                        'controller' => 'Properties',
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
                        ]
                    ]
                ]
            ]
        ]
    ]
];