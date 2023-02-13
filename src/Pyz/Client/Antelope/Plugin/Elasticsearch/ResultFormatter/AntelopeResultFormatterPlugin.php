<?php

namespace Pyz\Client\Antelope\Plugin\Elasticsearch\ResultFormatter;

use Elastica\ResultSet;
use Spryker\Client\SearchElasticsearch\Plugin\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

class AntelopeResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
    public const NAME = 'antelope';

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::NAME;
    }

    /**
     * @param ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return array
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters): array
    {
        if (!$searchResult->getResults()) {
            return [];
        }


        return $searchResult->getResults()[0]->getSource();
    }
}
