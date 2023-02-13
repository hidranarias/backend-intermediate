<?php

namespace Pyz\Zed\AntelopeSearch\Persistence;


use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery;
use Pyz\Zed\AntelopeSearch\Persistence\Mapper\AntelopeSearchMapper;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method AntelopeSearchRepositoryInterface getRepository()
 * @method AntelopeSearchEntityManagerInterface getEntityManager()
 */
class AntelopeSearchPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzAntelopeSearchQuery
     */
    public function createAntelopeSearchQuery(): PyzAntelopeSearchQuery
    {
        return PyzAntelopeSearchQuery::create();
    }

    /**
     * @return AntelopeSearchMapper
     */
    public function createAntelopeSearchMapper(): AntelopeSearchMapper
    {
        return new AntelopeSearchMapper();
    }


}
