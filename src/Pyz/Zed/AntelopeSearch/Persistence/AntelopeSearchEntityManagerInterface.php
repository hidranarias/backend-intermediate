<?php

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Pyz\Zed\AntelopeSearch\Persistence\Exception\AntelopeSearchNotFoundException;

interface AntelopeSearchEntityManagerInterface
{
    /**
     * @param AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return AntelopeSearchTransfer
     */
    public function createAntelopeSearch(AntelopeSearchTransfer $antelopeSearchTransfer): AntelopeSearchTransfer;

    /**
     * @param AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return AntelopeSearchTransfer
     * @throws AntelopeSearchNotFoundException
     *
     */
    public function updateAntelopeSearch(AntelopeSearchTransfer $antelopeSearchTransfer): AntelopeSearchTransfer;
}
