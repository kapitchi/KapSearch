<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapSearch\Predicate;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class PredicateSet
{
    const OP_AND = 'and';
    const OP_OR = 'or';
    
    protected $predicates;
    protected $queue;
    
    public function addPredicateQueue(PredicateInterface $predicate, $op = self::OP_AND) {
        $name = $predicate->getName();
        if(empty($name)) {
            throw new \Exception("Predicate name can't be empty");
        }
        
        $this->predicates[$name] = $predicate;
        $this->queue[$name] = array($op, $predicate);
    }
    
    public function getPredicateQueue()
    {
        return $this->queue;
    }
    
    public function getPredicates() {
        return $this->predicates;
    }

}