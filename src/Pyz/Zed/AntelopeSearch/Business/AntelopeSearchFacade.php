<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchBusinessFactory getFactory()
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface getRepository()
 */
class AntelopeSearchFacade extends AbstractFacade implements AntelopeSearchFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<\Pyz\Zed\AntelopeSearch\Business\EventEntityTransfer> $eventTransfers
     *
     * @return void
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $this->getFactory()
            ->createAntelopeSearchWriter()
            ->writeCollectionByAntelopeEvents($eventTransfers);
    }
}
