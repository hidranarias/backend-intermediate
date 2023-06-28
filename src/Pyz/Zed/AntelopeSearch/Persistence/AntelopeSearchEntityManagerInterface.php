<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchTransfer;

interface AntelopeSearchEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeSearchTransfer
     */
    public function createAntelopeSearch(AntelopeSearchTransfer $antelopeSearchTransfer): AntelopeSearchTransfer;

    /**
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @throws \Pyz\Zed\AntelopeSearch\Persistence\Exception\AntelopeSearchNotFoundException
     *
     * @return \Generated\Shared\Transfer\AntelopeSearchTransfer
     */
    public function updateAntelopeSearch(AntelopeSearchTransfer $antelopeSearchTransfer): AntelopeSearchTransfer;
}
