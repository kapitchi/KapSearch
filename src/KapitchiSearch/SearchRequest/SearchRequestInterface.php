<?php
namespace KapitchiSearch\SearchRequest;

/**
 * 
 * @author Matus Zeman <mz@kapitchi.com>
 */
interface SearchRequestInterface
{
    public function configureSearchOptions(\KapitchiSearch\Service\SearchOptionsInterface $options);
}