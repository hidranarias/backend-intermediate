<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchPersistenceFactory getFactory()
 */
class AntelopeSearchRepository extends AbstractRepository implements AntelopeSearchRepositoryInterface
{
 /**
  * @param \Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer
  *
  * @return array<\Generated\Shared\Transfer\AntelopeSearchTransfer>
  */
    public function getAntelopeSearches(AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer): array
    {
        $antelopeSearchEntities = $this->getFactory()
            ->createAntelopeSearchQuery()
            ->filterByfkAntelope_In($antelopeSearchCriteriaTransfer->getFksAntelope())
            ->find();

        $antelopeSearchTransfers = [];

        foreach ($antelopeSearchEntities as $antelopeSearchEntity) {
            $antelopeSearchTransfers[] = $this->getFactory()
                ->createAntelopeSearchMapper()
                ->mapAntelopeSearchEntityToAntelopeSearchTransfer($antelopeSearchEntity, new AntelopeSearchTransfer());
        }

        return $antelopeSearchTransfers;
    }
}
