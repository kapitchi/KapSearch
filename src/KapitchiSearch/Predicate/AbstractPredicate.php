<?php
namespace KapitchiSearch\Predicate;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
abstract class AbstractPredicate implements PredicateInterface
{
    protected $name;
    protected $value;
    protected $field;
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($field)
    {
        $this->field = $field;
    }
    
    public function setOptions($options)
    {
        if(isset($options['name'])) {
            $this->setName($options['name']);
        }
        if(isset($options['value'])) {
            $this->setValue($options['value']);
        }
        if(isset($options['field'])) {
            $this->setField($options['field']);
        }
    }
}