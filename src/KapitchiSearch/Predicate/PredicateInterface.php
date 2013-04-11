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