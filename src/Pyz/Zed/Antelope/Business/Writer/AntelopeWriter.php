<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;

/**
 * @method
 */
class AntelopeWriter implements AntelopeWriterInterface
{
    public function __construct(protected AntelopeEntityManagerInterface $antelopeEntityManager)
    {
    }

    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->antelopeEntityManager->createAntelope($antelopeTransfer);
    }

    public function deleteAntelope(AntelopeTransfer $antelopeTransfer): bool
    {
        return $this->antelopeEntityManager->deleteAntelope($antelopeTransfer);
    }
}
