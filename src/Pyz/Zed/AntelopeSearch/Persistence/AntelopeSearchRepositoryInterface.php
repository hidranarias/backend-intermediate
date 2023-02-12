<?php

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;

interface AntelopeSearchRepositoryInterface
{

    /**
     * @param AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer
     *
     * @return AntelopeSearchTransfer[]
     */
    public function getAntelopeSearches(AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer): array;
}
