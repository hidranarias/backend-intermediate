<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi\Plugin;

use Generated\Shared\Transfer\RestAntelopesAttributesTransfer;
use Pyz\Glue\AntelopesRestApi\AntelopesRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Glue\AntelopesRestApi\AntelopesRestApiFactory getFactory()
 */
class AntelopesResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet('get', false);

        return $resourceRouteCollection;
    }

    public function getResourceType(): string
    {
        return AntelopesRestApiConfig::RESOURCE_ANTELOPES;
    }

    public function getController(): string
    {
        return 'antelopes-resource';
    }

    public function getResourceAttributesClassName(): string
    {
        return RestAntelopesAttributesTransfer::class;
    }
}
