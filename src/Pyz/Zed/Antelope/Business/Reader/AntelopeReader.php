<?php

namespace Pyz\Zed\Antelope\Business\Reader;


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
}
