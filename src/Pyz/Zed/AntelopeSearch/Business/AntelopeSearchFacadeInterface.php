<?php

namespace Pyz\Zed\AntelopeSearch\Business;


use Generated\Shared\Transfer\EventEntityTransfer;

/**
 * @method AntelopeSearchBusinessFactory getFactory()
 */

/**
 * Specification:
 * - Retrieves all antelopes using IDs from $eventTransfers.
 * - Updates entities from `pyz_antelope_search` with actual data from obtained antelopes.
 * - Sends a copy of data to queue based on module config.
 *
 * @param EventEntityTransfer[] $eventTransfers
 *
 * @return void
 * @api
 *
 */
interface AntelopeSearchFacadeInterface
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
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void;
}
