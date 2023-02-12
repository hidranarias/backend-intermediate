<?php

namespace Pyz\Zed\AntelopeSearch\Business\Writer;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

class AntelopeSearchWriter
{


    public function __construct(
        protected EventBehaviorFacadeInterface $eventBehaviorFacade
    ) {
    }

    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

        $this->writeCollectionByAntelopeIds($antelopeIds);
    }

    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
    {
        if (!$antelopeIds) {
            return;
        }

        // Note: The following code should not be part of the Business Layer because it contains persistence logic.
        // For training purposes we keep this block here to focus on the publish&synchronize process.
        // In an optional exercise you will have the task to move the persistence logic properly into the Persistence Layer.

        foreach ($antelopeIds as $antelopeId) {
            $antelopeEntity = PyzAntelopeQuery::create()
                ->filterByIdAntelope($antelopeId)
                ->findOne();

            $searchEntity = PyzAntelopeSearchQuery::create()
                ->filterByFkAntelope($antelopeId)
                ->findOneOrCreate();
            $searchEntity->setFkAntelope($antelopeId);

            $searchData = $antelopeEntity->toArray();
            $searchEntity->setData($searchData);

            $searchEntity->save();
        }
    }
}
