<?php

namespace KapitchiSearch\Controller;

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
                $request = new \KapitchiSearch\SearchRequest\Form($form);
                $options = new \KapitchiSearch\Service\AbstractSearchOptions();
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
