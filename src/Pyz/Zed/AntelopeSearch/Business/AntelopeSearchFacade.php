<?php

namespace Pyz\Zed\AntelopeSearch\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method AntelopeSearchBusinessFactory getFactory()
 */
class AntelopeSearchFacade extends AbstractFacade implements AntelopeSearchFacadeInterface

{
    /**
     * {@inheritDoc}
     *
     * @param EventEntityTransfer[] $eventTransfers
     *
     * @return void
     * @api
     *
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $this->getFactory()
            ->createAntelopeSearchWriter()
            ->writeCollectionByAntelopeEvents($eventTransfers);
    }
}
