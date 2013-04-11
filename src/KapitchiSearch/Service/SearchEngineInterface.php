<?php
namespace KapitchiSearch\Service;

/**
 * 
 * @author Matus Zeman <mz@kapitchi.com>
 */
interface SearchEngineInterface
{
    public function getSearchPaginatorAdapter(SearchOptionsInterface $searchOptions);
}