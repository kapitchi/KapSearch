<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch;

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
                'KapSearch\Controller\GlobalSearch' => function($sm) {
                    $ins = new Controller\GlobalSearchController(
                            $sm->getServiceLocator()->get('KapSearch\Form\Search'),
                            $sm->getServiceLocator()->get('KapSearch\Service\SearchEngine')
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
                //'KapAuction\Entity\Auction' => 'KapAuction\Entity\Auction',
            ),
            'factories' => array(
                'KapSearch\Form\Search' => function ($sm) {
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