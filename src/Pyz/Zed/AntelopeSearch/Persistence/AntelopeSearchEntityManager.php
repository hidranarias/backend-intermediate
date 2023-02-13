<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearch;
use Pyz\Zed\AntelopeSearch\Persistence\Exception\AntelopeSearchNotFoundException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchPersistenceFactory getFactory()
 */
class AntelopeSearchEntityManager extends AbstractEntityManager implements AntelopeSearchEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeSearchTransfer
     */
    public function createAntelopeSearch(
        AntelopeSearchTransfer $antelopeSearchTransfer,
    ): AntelopeSearchTransfer {
        $antelopeSearchEntity = $this->getFactory()
            ->createAntelopeSearchMapper()
            ->mapAntelopeSearchTransferToAntelopeSearchEntity(
                $antelopeSearchTransfer,
                new PyzAntelopeSearch(),
            );

        $antelopeSearchEntity->save();

        return $this->getFactory()
            ->createAntelopeSearchMapper()
            ->mapAntelopeSearchEntityToAntelopeSearchTransfer($antelopeSearchEntity, $antelopeSearchTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\AntelopeSearchTransfer $antelopeSearchTransfer
     *
     * @throws \Pyz\Zed\AntelopeSearch\Persistence\Exception\AntelopeSearchNotFoundException
     *
     * @return \Generated\Shared\Transfer\AntelopeSearchTransfer
     */
    public function updateAntelopeSearch(
        AntelopeSearchTransfer $antelopeSearchTransfer,
    ): AntelopeSearchTransfer {
        $antelopeSearchEntity = $this->getFactory()
            ->createAntelopeSearchQuery()
            ->filterByIdAntelopeSearch($antelopeSearchTransfer->getIdAntelopeSearch())
            ->findOne();

        if ($antelopeSearchEntity === null) {
            throw new AntelopeSearchNotFoundException(
                sprintf(
                    'AntelopeSearch was not found by given id %s',
                    $antelopeSearchTransfer->getIdAntelopeSearch(),
                ),
            );
        }

        $antelopeSearchEntity = $this->getFactory()
            ->createAntelopeSearchMapper()
            ->mapAntelopeSearchTransferToAntelopeSearchEntity(
                $antelopeSearchTransfer,
                $antelopeSearchEntity,
            );

        $antelopeSearchEntity->save();

        return $this->getFactory()
            ->createAntelopeSearchMapper()
            ->mapAntelopeSearchEntityToAntelopeSearchTransfer($antelopeSearchEntity, $antelopeSearchTransfer);
    }
}
