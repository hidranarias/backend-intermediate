<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Business\Reader;

use Generated\Shared\Transfer\FilterTransfer;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface;

class AntelopeSearchReader
{
    public function __construct(protected AntelopeSearchRepositoryInterface $antelopeSearchRepository)
    {
    }

    public function findAntelopeSearchByIds(FilterTransfer $filterTransfer, array $antelopeIds = []): array
    {
        return $this->antelopeSearchRepository
            ->findAntelopeSearchByIds($filterTransfer, $antelopeIds);
    }
}
