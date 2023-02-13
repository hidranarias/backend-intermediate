<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Antelope;

use Pyz\Client\Antelope\Plugin\Elasticsearch\ResultFormatter\AntelopeResultFormatterPlugin;
use Pyz\Client\Antelope\Plugin\Elasticsearch\ResultFormatter\AntelopeResultsFormatterPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class AntelopeDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_SEARCH = 'CLIENT_SEARCH';

    /**
     * @var string
     */
    public const ANTELOPE_RESULT_FORMATTER_PLUGINS = 'ANTELOPE_RESULT_FORMATTER_PLUGINS';

    /**
     * @var string
     */
    public const ANTELOPE_RESULTS_FORMATTER_PLUGINS = 'ANTELOPE_RESULTS_FORMATTER_PLUGINS';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $this->addSearchClient($container);
        $this->addCatalogSearchResultsFormatterPlugins($container);

        return $this->addCatalogSearchResultFormatterPlugins($container);
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addSearchClient(Container $container): Container
    {
        $container->set(static::CLIENT_SEARCH, static function (Container $container) {
            return $container->getLocator()->search()->client();
        });

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function addCatalogSearchResultsFormatterPlugins(Container $container): Container
    {
        $container->set(static::ANTELOPE_RESULTS_FORMATTER_PLUGINS, static function () {
            return [
                new AntelopeResultsFormatterPlugin(),
            ];
        });

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function addCatalogSearchResultFormatterPlugins(Container $container): Container
    {
        $container->set(static::ANTELOPE_RESULT_FORMATTER_PLUGINS, static function () {
            return [
                new AntelopeResultFormatterPlugin(),
            ];
        });

        return $container;
    }
}
