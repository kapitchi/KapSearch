<?php

namespace KapitchiSearch\Form;

use KapitchiBase\Form\EventManagerAwareForm;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class Search extends EventManagerAwareForm
{
    public function __construct()
    {
        parent::__construct();
        
//        $this->add(array(
//            'name' => 'search',
//            'type' => 'Zend\Form\Element\Hidden',
//            'options' => array(
//            ),
//        ));
//        $this->get('search')->setValue(true);
//        
//        $this->add(array(
//            'name' => 'fulltext',
//            'type' => 'Zend\Form\Element\Text',
//            'options' => array(
//                'label' => $this->translate("Full text search"),
//                'search' => array(
//                    'type' => 'KapitchiSearch\Predicate\Fulltext',
//                    'options' => array(
//                        'field' => 'fulltext'
//                    )
//                ),
//            ),
//        ));
        
    }
}