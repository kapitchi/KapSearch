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
class AbstractSearchOptions implements SearchOptionsInterface
{
    protected $fulltextSearch;
    protected $order;
    protected $predicateSet;
    
    public function isActive()
    {
        $predicateSet = $this->getPredicateSet();
        if($predicateSet === null) {
            return false;
        }
        $predicates = $predicateSet->getPredicates();
        if(empty($predicates)) {
            return false;
        }
        
        return true;
    }
    
    public function getFulltextSearch()
    {
        return $this->fulltextSearch;
    }

    public function setFulltextSearch($fulltextSearch)
    {
        $this->fulltextSearch = $fulltextSearch;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder(array $order)
    {
        $this->order = $order;
    }

    public function getPredicateSet()
    {
        return $this->predicateSet;
    }

    public function setPredicateSet(\KapSearch\Predicate\PredicateSet $predicateSet)
    {
        $this->predicateSet = $predicateSet;
    }

}