<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery;
use Pyz\Zed\AntelopeSearch\Persistence\Mapper\AntelopeSearchMapper;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface getRepository()
 * @method \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface getEntityManager()
 */
class AntelopeSearchPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery
     */
    public function createAntelopeSearchQuery(): PyzAntelopeSearchQuery
    {
        return PyzAntelopeSearchQuery::create();
    }

    /**
     * @return \Pyz\Zed\AntelopeSearch\Persistence\Mapper\AntelopeSearchMapper
     */
    public function createAntelopeSearchMapper(): AntelopeSearchMapper
    {
        return new AntelopeSearchMapper();
    }
}
