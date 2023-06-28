<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Pyz\Zed\Antelope\Persistence\AntelopePersistenceFactory getFactory()
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

    /**
     * @param \Generated\Shared\Transfer\AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     *
     * @return array<\Generated\Shared\Transfer\AntelopeTransfer>
     */
    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array
    {
        $antelopeEntities = $this->getFactory()->createAntelopeQuery()
            ->filterByIdAntelope_In($antelopeCriteriaTransfer->getIdsAntelope())
            ->find();

        $antelopeTransfers = [];

        foreach ($antelopeEntities as $antelopeEntity) {
            $antelopeTransfers[] = (new AntelopeTransfer())
                ->fromArray($antelopeEntity->toArray(), true);
        }

        return $antelopeTransfers;
    }
}
