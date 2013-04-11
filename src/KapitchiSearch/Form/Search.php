<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch\Form;

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
//                    'type' => 'KapSearch\Predicate\Fulltext',
//                    'options' => array(
//                        'field' => 'fulltext'
//                    )
//                ),
//            ),
//        ));
        
    }
}