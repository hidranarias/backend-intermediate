<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Synchronization;

use Generated\Shared\Transfer\FilterTransfer;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConstants;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SynchronizationExtension\Dependency\Plugin\SynchronizationDataBulkRepositoryPluginInterface;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchFacadeInterface getFacade()
 * @method \Pyz\Zed\AntelopeSearch\AntelopeSearchConfig getConfig()
 */
class AntelopeSynchronizationDataPlugin extends AbstractPlugin implements
    SynchronizationDataBulkRepositoryPluginInterface
{
 /**
  * @inheritDoc
  */
    public function getData(int $offset, int $limit, array $ids = []): array
    {
        return $this->getFacade()->findAntelopeSearchByIds(
            $this->createFilterTransfer($offset, $limit),
            $ids,
        );
    }

    protected function createFilterTransfer(int $offset, int $limit): FilterTransfer
    {
        return (new FilterTransfer())
            ->setOffset($offset)
            ->setLimit($limit);
    }

    /**
     * @inheritDoc
     */
    public function getResourceName(): string
    {
        return AntelopeSearchConstants::ANTELOPE_RESOURCE_NAME;
    }

    /**
     * @inheritDoc
     */
    public function hasStore(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getParams(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getQueueName(): string
    {
        return AntelopeSearchConfig::ANTELOPE_SYNC_SEARCH_QUEUE;
    }

    /**
     * @inheritDoc
     */
    public function getSynchronizationQueuePoolName(): ?string
    {
        return $this->getConfig()->getAntelopeSynchronizationPoolName();
    }
}
