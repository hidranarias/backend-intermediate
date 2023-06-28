<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Business\Writer;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

class AntelopeSearchWriter
{
    public function __construct(
        protected EventBehaviorFacadeInterface $eventBehaviorFacade,
        protected AntelopeFacadeInterface $antelopeFacade,
        protected AntelopeSearchEntityManagerInterface $antelopeSearchEntityManager,
        protected AntelopeSearchRepositoryInterface $antelopeSearchRepository,
    ) {
    }

    /**
     * @return void
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

        $this->writeCollectionByAntelopeIds($antelopeIds);
    }

    /**
     * @return void
     */
    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
    {
        $antelopeTransfersIndexed = $this->getAntelopeTransfersIndexed($antelopeIds);
        $antelopeSearchTransfersIndexed = $this->getAntelopeSearchTransfersIndexed(
            array_keys($antelopeTransfersIndexed),
        );

        foreach ($antelopeTransfersIndexed as $antelopeId => $antelopeTransfer) {
            $searchData = $antelopeTransfer->toArray();

            $antelopeSearchTransfer = $antelopeSearchTransfersIndexed[$antelopeId] ?? new AntelopeSearchTransfer();

            $antelopeSearchTransfer
            ->setFkAntelope($antelopeId)
            ->setData($searchData);

            if ($antelopeSearchTransfer->getIdAntelopeSearch() === null) {
                $this->antelopeSearchEntityManager->createAntelopeSearch($antelopeSearchTransfer);

                continue;
            }

            $this->antelopeSearchEntityManager->updateAntelopeSearch($antelopeSearchTransfer);
        }
    }

    /**
     * @param array<int> $antelopeIds
     *
     * @return array<\Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeTransfer>
     */
    protected function getAntelopeTransfersIndexed(array $antelopeIds): array
    {
        $antelopeCriteriaTransfer = (new AntelopeCriteriaTransfer())
        ->setIdsAntelope($antelopeIds);

        $antelopeTransfers = $this->antelopeFacade
        ->filterByIdAntelope_In($antelopeCriteriaTransfer);

        $antelopeTransfersIndexed = [];
        foreach ($antelopeTransfers as $antelopeTransfer) {
            $antelopeTransfersIndexed[$antelopeTransfer->getIdAntelope()] = $antelopeTransfer;
        }

        return $antelopeTransfersIndexed;
    }

    /**
     * @param array<int> $antelopeIds
     *
     * @return array<\Generated\Shared\Transfer\AntelopeSearchTransfer>
     */
    protected function getAntelopeSearchTransfersIndexed(array $antelopeIds): array
    {
        $antelopeSearchCriteriaTransfer = (new AntelopeSearchCriteriaTransfer())
        ->setFksAntelope($antelopeIds);

        $antelopeSearchTransfers = $this->antelopeSearchRepository
        ->getAntelopeSearches($antelopeSearchCriteriaTransfer);

        $antelopeSearchTransfersIndexed = [];
        foreach ($antelopeSearchTransfers as $antelopeSearchTransfer) {
            $antelopeSearchTransfersIndexed[$antelopeSearchTransfer->getFkAntelope()] = $antelopeSearchTransfer;
        }

        return $antelopeSearchTransfersIndexed;
    }
}
