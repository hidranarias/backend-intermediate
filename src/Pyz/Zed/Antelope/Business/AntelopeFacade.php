<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method AntelopeBusinessFactory getFactory()
 * @method AntelopeEntityManagerInterface getEntityManager()
 */
class AntelopeFacade extends AbstractFacade implements AntelopeFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     * @api
     *
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->getFactory()
            ->createAntelopeWriter()
            ->createAntelope($antelopeTransfer);
    }

    public function deleteAntelope(AntelopeTransfer $antelopeTransfer): bool
    {
        return $this->getFactory()->createAntelopeWriter()->deleteAntelope($antelopeTransfer);
    }

    public function findAntelope(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer
    {
        return $this->getFactory()->createAntelopeReader()->findAntelope($antelopeTransfer);
    }

    /**
     *
     * @return AntelopeTransfer[]
     *
     */
    public function filterByIdAntelope_In(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array
    {
        return $this->getFactory()->createAntelopeReader()
            ->getAntelopes($antelopeCriteriaTransfer);
    }
}
