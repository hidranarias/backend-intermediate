<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Antelope;

use Pyz\Client\Antelope\Plugin\Elasticsearch\Query\AntelopeQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\SearchClientInterface;

class AntelopeFactory extends AbstractFactory
{
    /**
     * @param string|null $name
     *
     * @return \Pyz\Client\Antelope\Plugin\Elasticsearch\Query\AntelopeQueryPlugin
     */
    public function createAntelopeQueryPlugin(?string $name = null): AntelopeQueryPlugin
    {
        return new AntelopeQueryPlugin($name);
    }

    /**
     * @return array
     */
    public function getSearchQueryFormatters(): array
    {
        return $this->getProvidedDependency(AntelopeDependencyProvider::ANTELOPE_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @return array
     */
    public function getSearchQueryResultsFormatter(): array
    {
        return $this->getProvidedDependency(AntelopeDependencyProvider::ANTELOPE_RESULTS_FORMATTER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient(): SearchClientInterface
    {
        return $this->getProvidedDependency(AntelopeDependencyProvider::CLIENT_SEARCH);
    }
}
