<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;

interface AntelopeSearchRepositoryInterface
{
 /**
  * @param \Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer
  *
  * @return array<\Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchTransfer>
  */
    public function getAntelopeSearches(AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer): array;
}
