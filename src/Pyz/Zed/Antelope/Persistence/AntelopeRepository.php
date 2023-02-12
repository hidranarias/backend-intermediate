<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method AntelopePersistenceFactory getFactory()
 */
class AntelopeRepository extends AbstractRepository implements AntelopeRepositoryInterface
{
    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer
    {
        $antelopeQuery = $this->getFactory()->createAntelopeQuery();
        $antelopeEntity = $antelopeQuery->filterByName($antelopeTransfer->getName())->findOne();
        if (!$antelopeEntity) {
            return null;
        }
        return $antelopeTransfer->fromArray($antelopeEntity->toArray());
    }
}
