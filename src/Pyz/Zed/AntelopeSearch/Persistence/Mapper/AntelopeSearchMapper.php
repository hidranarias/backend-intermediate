<?php

namespace Pyz\Zed\AntelopeSearch\Persistence\Mapper;

use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch;

class AntelopeSearchMapper
{
    /**
     * @param AntelopeSearchTransfer $antelopeSearchTransfer
     * @param PyzAntelopeSearch $antelopeSearchEntity
     *
     * @return PyzAntelopeSearch
     */
    public function mapAntelopeSearchTransferToAntelopeSearchEntity(
        AntelopeSearchTransfer $antelopeSearchTransfer,
        PyzAntelopeSearch $antelopeSearchEntity
    ): PyzAntelopeSearch {
        return $antelopeSearchEntity->fromArray($antelopeSearchTransfer->modifiedToArray());
    }

    /**
     * @param PyzAntelopeSearch $antelopeSearchEntity
     * @param AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return AntelopeSearchTransfer
     */
    public function mapAntelopeSearchEntityToAntelopeSearchTransfer(
        PyzAntelopeSearch $antelopeSearchEntity,
        AntelopeSearchTransfer $antelopeSearchTransfer
    ): AntelopeSearchTransfer {
        return $antelopeSearchTransfer->fromArray($antelopeSearchEntity->toArray(), true);
    }
}
