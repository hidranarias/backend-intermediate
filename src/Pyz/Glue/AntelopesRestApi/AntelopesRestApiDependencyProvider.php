<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

/**
 * @method \Pyz\Glue\AntelopesRestApi\AntelopesRestApiConfig getConfig()
 */
class AntelopesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_ANTELOPE = 'CLIENT_ANTELOPE';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        return $this->addAntelopeClient($container);
    }

    protected function addAntelopeClient(Container $container): Container
    {
        $container->set(static::CLIENT_ANTELOPE, static function (Container $container) {
            return $container->getLocator()->antelope()->client();
        });

        return $container;
    }
}
