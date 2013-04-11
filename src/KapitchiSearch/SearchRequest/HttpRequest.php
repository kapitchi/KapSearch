<?php
namespace KapitchiSearch\SearchRequest;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class HttpRequest implements SearchRequestInterface
{
    protected $httpRequest;
            
    public function __construct(\Zend\Http\Request $httpRequest)
    {
        $this->setHttpRequest($httpRequest);
    }
    
    public function configureSearchOptions(\KapitchiSearch\Service\SearchOptionsInterface $options)
    {
        $request = $this->getHttpRequest();
        $s = $request->getQuery()->get('s');
        if(empty($s)) {
            return;
        }
        
        $predicateSet = new \KapitchiSearch\Predicate\PredicateSet();
        if(is_string($s)) {
            $p = new \KapitchiSearch\Predicate\Fulltext();
            $p->setValue($s);
            $predicateSet->addPredicate($p);
            $options->setPredicateSet($predicateSet);
            return;
        }
        
        if(is_array($s)) {
            foreach($s as $name => $opts) {
                if(is_string($opts)) {
                    $options->setQuery($name, $opts);
                    continue;
                }
                else {
                    if(!isset($opts['q'])) {
                        throw new \Exception("We need a query!");
                    }
                    $options->setQuery($name, $opts['q']);
                    
                    if(!empty($opts['o'])) {
                        $options->setOrder($opts);
                    }
                }
            }
        }
        
        $options->setPredicateSet($predicateSet);
    }
    
    public function getHttpRequest()
    {
        return $this->httpRequest;
    }

    public function setHttpRequest($httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }


}