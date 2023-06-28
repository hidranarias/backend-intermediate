<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Business\Reader;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

interface AntelopeReaderInterface
{
    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer;

    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array;
}
