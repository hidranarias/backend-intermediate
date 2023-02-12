<?php

namespace Pyz\Zed\AntelopeSearch\Business\Writer;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

class AntelopeSearchWriter
{


    public function __construct(
        protected EventBehaviorFacadeInterface $eventBehaviorFacade,
        protected AntelopeFacadeInterface $antelopeFace,
        protected AntelopeSearchEntityManagerInterface $antelopeSearchEntityManager,
        protected AntelopeSearchRepositoryInterface $antelopeSearchRepository
    ) {
    }

    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

        $this->writeCollectionByAntelopeIds($antelopeIds);
    }

    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
    {
        $antelopeTransfersIndexed = $this->getAntelopeTransfersIndexed($antelopeIds);
        $antelopeSearchTransfersIndexed = $this->getAntelopeSearchTransfersIndexed(
            array_keys($antelopeTransfersIndexed)
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
     * @param int[] $antelopeIds
     *
     * @return AntelopeTransfer[]
     */
    protected function getAntelopeTransfersIndexed(array $antelopeIds): array
    {
        $antelopeCriteriaTransfer = (new AntelopeCriteriaTransfer())
            ->setIdsAntelope($antelopeIds);

        $antelopeTransfers = $this->antelopeFace
            ->filterByIdAntelope_In($antelopeCriteriaTransfer);

        $antelopeTransfersIndexed = [];
        foreach ($antelopeTransfers as $antelopeTransfer) {
            $antelopeTransfersIndexed[$antelopeTransfer->getIdAntelope()] = $antelopeTransfer;
        }

        return $antelopeTransfersIndexed;
    }

    /**
     * @param int[] $antelopeIds
     *
     * @return AntelopeSearchTransfer[]
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
