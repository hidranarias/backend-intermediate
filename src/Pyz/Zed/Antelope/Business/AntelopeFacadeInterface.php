<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

interface AntelopeFacadeInterface
{
    /**
     * Specification:
     * - Creates a new antelope into the database
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     * @api
     *
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer;

    public function deleteAntelope(AntelopeTransfer $antelopeTransfer): bool;

    /**
     *
     * @return AntelopeTransfer[]
     *
     */
    public function filterByIdAntelope_In(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array;
}
