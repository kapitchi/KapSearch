<?php
return array(
    'controller_plugins' => array(
        'classes' => array(
            //'test' => 'Test\Controller\Plugin\Test'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            //'test/index/index'   => __DIR__ . '/../view/test/index/index.phtml',
        ),
        'template_path_stack' => array(
            //'test' => __DIR__ . '/../view',
        ),
        'helper_map' => array(
            //'js'        => 'Test\View\Helper\Js',
        ),

    ),
    'router' => array(
        'routes' => array(
            'search' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/search',
                    'defaults' => array(
                        '__NAMESPACE__' => 'KapitchiSearch\Controller',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'global-search' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/global-search',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'GlobalSearch',
                                'action' => 'index'
                            ),
                        ),
                    ),
                    'api' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/api',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Test\Controller\Api',
                            ),
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'entity' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/entity[/:id][/:action]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Entity',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
