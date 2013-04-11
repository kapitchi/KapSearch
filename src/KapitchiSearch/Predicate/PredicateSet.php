<?php
namespace KapitchiSearch\Predicate;

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