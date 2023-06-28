<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Business\Reader;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

class AntelopeReader implements AntelopeReaderInterface
{
    public function __construct(protected AntelopeRepositoryInterface $antelopeRepository)
    {
    }

    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer
    {
        return $this->antelopeRepository->findAntelope($antelopeTransfer);
    }

    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array
    {
        return $this->antelopeRepository->getAntelopes($antelopeCriteriaTransfer);
    }
}
