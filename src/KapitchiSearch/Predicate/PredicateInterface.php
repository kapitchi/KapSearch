<?php
namespace KapitchiSearch\Predicate;

/**
 * 
 * @author Matus Zeman <mz@kapitchi.com>
 */
interface PredicateInterface
{
    public function setName($name);
    public function getName();
    public function setField($field);
    public function getField();
    public function setValue($value);
    public function getValue();
    public function setOptions($options);
}