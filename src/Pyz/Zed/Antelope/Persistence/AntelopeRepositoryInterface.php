<?php

namespace Pyz\Zed\Antelope\Persistence;


use Generated\Shared\Transfer\AntelopeTransfer;

/**
 * @method AntelopePersistenceFactory getFactory()
 */
interface AntelopeRepositoryInterface
{
    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer;
}
