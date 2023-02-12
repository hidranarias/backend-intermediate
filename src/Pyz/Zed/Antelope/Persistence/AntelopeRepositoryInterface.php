<?php

namespace Pyz\Zed\Antelope\Persistence;


use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

/**
 * @method AntelopePersistenceFactory getFactory()
 */
interface AntelopeRepositoryInterface
{
    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer;

    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     * @return array<AntelopeTransfer>
     */
    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array;
}
