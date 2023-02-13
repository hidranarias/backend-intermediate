<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Antelope\Plugin\Elasticsearch\ResultFormatter;

use Elastica\ResultSet;
use Spryker\Client\SearchElasticsearch\Plugin\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

class AntelopeResultsFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
 /**
  * @var string
  */
    public const NAME = 'antelopes';

    public function getName()
    {
        return static::NAME;
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return array
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters): array
    {
        $response = [];
        if (!$searchResult->getResults()) {
            $response;
        }

        foreach ($searchResult->getResults() as $result) {
            $response[] = $result->getSource();
        }

        return $response;
    }
}
