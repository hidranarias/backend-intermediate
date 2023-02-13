<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Business;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchBusinessFactory getFactory()
 */

/**
 * Specification:
 * - Retrieves all antelopes using IDs from $eventTransfers.
 * - Updates entities from `pyz_antelope_search` with actual data from obtained antelopes.
 * - Sends a copy of data to queue based on module config.
 *
 * @param array<\Pyz\Zed\AntelopeSearch\Business\EventEntityTransfer> $eventTransfers
 *
 * @return void
 * @api
 */
interface AntelopeSearchFacadeInterface
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
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void;
}
