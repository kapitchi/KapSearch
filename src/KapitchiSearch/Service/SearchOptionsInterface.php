<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch\Service;

/**
 * 
 * @author Matus Zeman <mz@kapitchi.com>
 */
interface SearchOptionsInterface
{
    const ORDER_ASC = 'ASC';
    const ORDER_DESC = 'DESC';
    
    public function setPredicateSet(\KapSearch\Predicate\PredicateSet $predicateSet);
    public function getPredicateSet();

    /**
     * array(
     *      'field1' => SearchOptions::ASC,
     *      'field2' => SearchOptions::DESC
     * )
     * @return array
     */
    public function getOrder();
    public function setOrder(array $order);
}