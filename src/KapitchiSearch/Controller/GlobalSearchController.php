<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class GlobalSearchController extends AbstractActionController
{
    protected $form;
    protected $engine;
    
    public function __construct($form, $engine)
    {
        $this->setForm($form);
        $this->setEngine($engine);
    }
    
    public function indexAction()
    {
        $form = $this->getForm();
        $params = array(
            'form' => $form
        );
        
        if($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            
            //mz: datetime elements sets required by default - we set all elements to not-required
            $inputFilter = $form->getInputFilter();
            foreach($inputFilter->getRawValues() as $key => $value) {
                $inputFilter->get($key)->setRequired(false);
            }
            //END
            
            if($form->isValid()) {
                $request = new \KapSearch\SearchRequest\Form($form);
                $options = new \KapSearch\Service\AbstractSearchOptions();
                $request->configureSearchOptions($options);
                if($options->isActive()) {
                    $adapter = $this->getEngine()->getSearchPaginatorAdapter($options);
                    $paginator = new \Zend\Paginator\Paginator($adapter);
                    $params['paginator'] = $paginator;
                    $params['searchOptions'] = $options;
                }
            }
        }
        
        return new ViewModel($params);
    }
    
    public function getForm()
    {
        return $this->form;
    }

    public function setForm($form)
    {
        $this->form = $form;
    }
    
    public function getEngine()
    {
        return $this->engine;
    }

    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

}
