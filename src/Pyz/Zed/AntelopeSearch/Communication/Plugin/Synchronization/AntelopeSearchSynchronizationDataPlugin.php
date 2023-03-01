<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Synchronization;


use Propel\Runtime\ActiveQuery\ModelCriteria;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Pyz\Zed\Synchronization\SynchronizationConfig;
use Spryker\Zed\CmsPageSearch\Business\CmsPageSearchFacadeInterface;
use Spryker\Zed\CmsPageSearch\CmsPageSearchConfig;
use Spryker\Zed\CmsPageSearch\Communication\CmsPageSearchCommunicationFactory;
use Spryker\Zed\CmsPageSearch\Persistence\CmsPageSearchQueryContainerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SynchronizationExtension\Dependency\Plugin\SynchronizationDataQueryContainerPluginInterface;

/**
 * @method CmsPageSearchQueryContainerInterface getQueryContainer()
 * @method CmsPageSearchFacadeInterface getFacade()
 * @method CmsPageSearchCommunicationFactory getFactory()
 * @method CmsPageSearchConfig getConfig()
 */
class AntelopeSearchSynchronizationDataPlugin extends AbstractPlugin implements
    SynchronizationDataQueryContainerPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @return string
     * @api
     *
     */
    public function getResourceName(): string
    {
        return AntelopeSearchConfig::ANTELOPE_SEARCH_RESOURCE_NAME;
    }

    /**
     * {@inheritDoc}
     *
     * @return bool
     * @api
     *
     */
    public function hasStore(): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     *
     * @param array<int> $ids
     *
     * @return ModelCriteria|null
     * @api
     *
     */
    public function queryData($ids = []): ?ModelCriteria
    {
        return null;
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     * @api
     *
     */
    public function getParams(): array
    {
        return [
            'type' => 'antelope',
            'index' => 'antelope'
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     * @api
     *
     */
    public function getQueueName(): string
    {
        return AntelopeSearchConfig::ANTELOPE_SYNC_SEARCH_QUEUE;
    }

    /**
     * {@inheritDoc}
     *
     * @return string|null
     * @api
     *
     */
    public function getSynchronizationQueuePoolName(): ?string
    {
        return SynchronizationConfig::PYZ_DEFAULT_SYNCHRONIZATION_POOL_NAME;
    }
}
