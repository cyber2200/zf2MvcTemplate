<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Test1\Controller\Index' => 'Test1\Controller\IndexController',
			'Test1\Controller\Foo' => 'Test1\Controller\FooController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'test1' => array(
               'type'    => 'Segment',
				'options' => array(
					'route'    => '/test1[/:controller[/:action]]',
					'constraints' => array(
						'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
					),
					'defaults' => array(
						'__NAMESPACE__' => 'Test1\Controller',
						'controller'    => 'Index',
						'action'        => 'index',
					),
				),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'test1' => __DIR__ . '/../view',
        ),
    ),
);