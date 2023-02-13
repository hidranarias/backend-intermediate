<?php

namespace Pyz\Client\Antelope;

use Pyz\Client\Antelope\Plugin\Elasticsearch\Query\AntelopeQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\SearchClientInterface;

class AntelopeFactory extends AbstractFactory
{
    /**
     * @param string $name
     *
     * @return AntelopeQueryPlugin
     */
    public function createAntelopeQueryPlugin(string $name): AntelopeQueryPlugin
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
     * @return SearchClientInterface
     */
    public function getSearchClient(): SearchClientInterface
    {
        return $this->getProvidedDependency(AntelopeDependencyProvider::CLIENT_SEARCH);
    }
}

