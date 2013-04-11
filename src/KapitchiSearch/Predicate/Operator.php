<?php
namespace KapitchiSearch\Predicate;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class Operator extends AbstractPredicate
{
    const EQ = '=';
    
    protected $operator = self::EQ;
    
    public function getOperator()
    {
        return $this->operator;
    }

    public function setOperator($operator)
    {
        $this->operator = $operator;
    }
    
    public function setOptions($options)
    {
        parent::setOptions($options);
        
        if(isset($options['operator'])) {
            $this->setOperator($options['operator']);
        }
    }

}