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