<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch\SearchRequest;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class Form implements SearchRequestInterface
{
    protected $form;
    
    public function __construct($form)
    {
        $this->setForm($form);
    }
    
    public function createPredicate($options)
    {
        if(!isset($options['type'])) {
            throw new \Exception("Type not defined");
        }
        
        $class = $options['type'];
        $predicate = new $class;
        $predicate->setOptions($options['options']);
        
        return $predicate;
    }
    
    public function configureSearchOptions(\KapSearch\Service\SearchOptionsInterface $options)
    {
        $form = $this->getForm();
        $predicateSet = new \KapSearch\Predicate\PredicateSet();
        
        $elements = $form->getElements();
        foreach($elements as $element) {
            $searchOptions = $element->getOption('search');
            if(!$searchOptions) {
                continue;
            }
            
            $isActive = true;
            if(isset($searchOptions['isActive'])) {
                $valueCallback = $searchOptions['isActive'];
                $isActive = $valueCallback($form);
            }
            
            if(!$isActive) {
                continue;
            }
            
            if(isset($searchOptions['value'])) {
                $valueCallback = $searchOptions['value'];
                $value = $valueCallback($form);
            }
            else {
                $value = $element->getValue();
            }
            if(empty($value)) {
                continue;
            }
            
            $predicate = $this->createPredicate($searchOptions);
            if($predicate->getName() == '') {
                $predicate->setName($element->getName());
            }
            $predicate->setValue($value);
            
            //XXX TODO mz: quick hack for working with intervals
            if($predicate instanceof \KapSearch\Predicate\Interval) {
                if($predicate->getValue() == $predicate->getSeparator()) {
                    continue;
                }
            }
            
            $predicateSet->addPredicateQueue($predicate);
        }
                
        $options->setPredicateSet($predicateSet);
    }
    
    public function getForm()
    {
        return $this->form;
    }

    public function setForm($form)
    {
        $this->form = $form;
    }
    
}