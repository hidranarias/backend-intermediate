<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence\Mapper;

use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch;
use Propel\Runtime\Collection\ObjectCollection;

class AntelopeSearchMapper
{
    /**
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     * @param \Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch $antelopeSearchEntity
     *
     * @return \Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch
     */
    public function mapAntelopeSearchTransferToAntelopeSearchEntity(
        AntelopeSearchTransfer $antelopeSearchTransfer,
        PyzAntelopeSearch $antelopeSearchEntity,
    ): PyzAntelopeSearch {
        return $antelopeSearchEntity->fromArray($antelopeSearchTransfer->modifiedToArray());
    }

    /**
     * @param \Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch $antelopeSearchEntity
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeSearchTransfer
     */
    public function mapAntelopeSearchEntityToAntelopeSearchTransfer(
        PyzAntelopeSearch $antelopeSearchEntity,
        AntelopeSearchTransfer $antelopeSearchTransfer,
    ): AntelopeSearchTransfer {
        return $antelopeSearchTransfer->fromArray($antelopeSearchEntity->toArray(), true);
    }

    public function mapAntelopeSearchEntityCollectionToSynchronizationDataTransfers(
        ObjectCollection $antelopeSearchEntityCollection,
    ): array {
        $synchronizationDataTransfers = [];

        foreach ($antelopeSearchEntityCollection as $antelopeSearchEntity) {
            $synchronizationDataTransfers[] = $this->mapAntelopeSearchEntityToSynchronizationDataTransfer(
                $antelopeSearchEntity,
                new SynchronizationDataTransfer(),
            );
        }

        return $synchronizationDataTransfers;
    }

    public function mapAntelopeSearchEntityToSynchronizationDataTransfer(
        PyzAntelopeSearch $antelopeSearchEntity,
        SynchronizationDataTransfer $synchronizationDataTransfer,
    ): SynchronizationDataTransfer {
        return $synchronizationDataTransfer
            ->setData($antelopeSearchEntity->getData())
            ->setKey($antelopeSearchEntity->getKey());
    }
}
