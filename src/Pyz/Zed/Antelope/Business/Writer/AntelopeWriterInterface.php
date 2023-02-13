<?php

namespace Pyz\Zed\Antelope\Business\Writer;


use Generated\Shared\Transfer\AntelopeTransfer;

/**
 * @method
 */
interface AntelopeWriterInterface
{
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    public function deleteAntelope(AntelopeTransfer $antelopeTransfer): bool;
}
