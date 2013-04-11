<?php

namespace KapitchiSearch;

use Zend\EventManager\EventInterface,
    Zend\ModuleManager\Feature\ControllerProviderInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface,
    Zend\ModuleManager\Feature\ViewHelperProviderInterface,
	KapitchiBase\ModuleManager\AbstractModule;

class Module extends AbstractModule
    implements ServiceProviderInterface, ControllerProviderInterface, ViewHelperProviderInterface
{

	public function onBootstrap(EventInterface $e) {
		parent::onBootstrap($e);
		
        
	}
    
    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'KapitchiSearch\Controller\GlobalSearch' => function($sm) {
                    $ins = new Controller\GlobalSearchController(
                            $sm->getServiceLocator()->get('KapitchiSearch\Form\Search'),
                            $sm->getServiceLocator()->get('KapitchiSearch\Service\SearchEngine')
                    );
                    return $ins;
                },
            )
        );
    }
    
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'XXX' => function($sm) {
                    $ins = new View\Helper\Test();
                    return $ins;
                },
            )
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                //'KapitchiAuction\Entity\Auction' => 'KapitchiAuction\Entity\Auction',
            ),
            'factories' => array(
                'KapitchiSearch\Form\Search' => function ($sm) {
                    $ins = new Form\Search();
                    return $ins;
                },
            )
        );
    }
    
    public function getDir() {
        return __DIR__;
    }

    public function getNamespace() {
        return __NAMESPACE__;
    }

}