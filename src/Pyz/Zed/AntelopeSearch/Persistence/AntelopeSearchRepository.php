<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Generated\Shared\Transfer\FilterTransfer;
use Propel\Runtime\Formatter\ObjectFormatter;
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

    public function findAntelopeSearchByIds(FilterTransfer $filterTransfer, array $antelopeIds = []): array
    {
        $query = $this->getFactory()
            ->createAntelopeSearchQuery();
        if ($antelopeIds !== []) {
            $query->filterByFkAntelope_In($antelopeIds);
        }
        $antelopeSearchEntityCollection = $this->buildQueryFromCriteria($query, $filterTransfer)
            ->setFormatter(ObjectFormatter::class)
            ->find();

        return $this->getFactory()->createAntelopeSearchMapper(
        )->mapAntelopeSearchEntityCollectionToSynchronizationDataTransfers(
            $antelopeSearchEntityCollection,
        );
    }

    public function getSynchronizationDataTransfersByFilterAndProductIds(
        FilterTransfer $filterTransfer,
        array $productIds = [],
    ): array {
        $query = $this->getFactory()
            ->createProductConcretePageSearchQuery();

        if ($productIds !== []) {
            $query->filterByFkProduct_In($productIds);
        }

        $productConcretePageSearchEntityCollection = $this->buildQueryFromCriteria($query, $filterTransfer)
            ->setFormatter(ObjectFormatter::class)
            ->find();

        return $this->getFactory()
            ->createProductPageSearchMapper()
            ->mapProductConcretePageSearchEntityCollectionToSynchronizationDataTransfers(
                $productConcretePageSearchEntityCollection,
            );
    }
}
