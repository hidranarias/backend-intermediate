<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeGui;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const PROPEL_QUERY_ANTELOPE = 'PROPEL_QUERY_ANTELOPE';
    public const FACADE_ANTELOPE = 'FACADE_ANTELOPE';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        parent::provideCommunicationLayerDependencies($container);

        $this->addAntelopePropelQuery($container);
        $this->addAntelopeFacade($container);
        return $container;
    }

    protected function addAntelopePropelQuery(Container $container): Container
    {
        $container->set(
            static::PROPEL_QUERY_ANTELOPE,
            $container->factory(function () {
                return PyzAntelopeQuery::create();
            }),
        );

        return $container;
    }

    protected function addAntelopeFacade(Container $container): Container
    {
        $container->set(static::FACADE_ANTELOPE, function (Container $container) {
            return $container->getLocator()->antelope()->facade();
        });

        return $container;
    }
}
