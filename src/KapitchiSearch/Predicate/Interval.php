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
class Interval extends AbstractPredicate
{
    protected $minValue;
    protected $maxValue;
    protected $separator = '-';

    public function getMinValue()
    {
        return $this->minValue;
    }

    public function getMaxValue()
    {
        return $this->maxValue;
    }
    
    /**
     * Public set via setValue()
     * @param type $minValue
     */
    protected function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }

    /**
     * Public set via setValue()
     * @param type $maxValue
     */
    protected function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }
        
    public function getSeparator()
    {
        return $this->separator;
    }

    public function setSeparator($separator)
    {
        $this->separator = $separator;
    }
    
    public function setOptions($options)
    {
        parent::setOptions($options);
        
        if(isset($options['separator'])) {
            $this->setSeparator($options['separator']);
        }
    }

    public function setValue($value)
    {
        parent::setValue($value);
        list($lowValue, $higtValue) = explode($this->getSeparator(), $value);
        $this->setMinValue(trim($lowValue));
        $this->setMaxValue(trim($higtValue));
    }

}