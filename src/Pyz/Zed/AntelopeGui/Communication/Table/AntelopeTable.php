<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeGui\Communication\Table;

use Orm\Zed\Antelope\Persistence\Map\PyzAntelopeTableMap;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class AntelopeTable extends AbstractTable
{
 /**
  * @var string
  */
    protected const ANTELOPEGUI_DELETE_URL = '/antelope-gui/delete';

    /**
     * @var string
     */
    public const COL_ID_ANTELOPE = 'id_antelope';

    /**
     * @var string
     */
    public const COL_NAME = 'name';

    /**
     * @var string
     */
    protected const COL_COLOR = 'color';

    /**
     * @var string
     */
    protected const ACTIONS = 'actions';

    /**
     * @var string
     */
    protected const REMOVE = 'Remove';

    public function __construct(protected PyzAntelopeQuery $antelopeQuery)
    {
    }

    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_ANTELOPE => 'Antelope ID',
            static::COL_NAME => 'Name',
            static::COL_COLOR => 'Color',
            static::ACTIONS => static::ACTIONS,

        ]);
        $config = $config->addRawColumn($config->addRawColumn(static::ACTIONS));

        $config->setSortable([
            static::COL_ID_ANTELOPE,
            static::COL_NAME,
            static::COL_COLOR,

        ]);

        $config->setSearchable([
            PyzAntelopeTableMap::COL_NAME,
            PyzAntelopeTableMap::COL_COLOR,
        ]);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $antelopeEntityCollection = $this->runQuery(
            $this->antelopeQuery,
            $config,
            true,
        );

        if (!$antelopeEntityCollection->count()) {
            return [];
        }

        return $this->mapReturns($antelopeEntityCollection);
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Pyz\Zed\AntelopeGui\Communication\Table\PyzAntelope> $antelopeEntityCollection
     *
     * @return array
     */
    protected function mapReturns(ObjectCollection $antelopeEntityCollection): array
    {
        $returns = [];
        /**
         * @var \Pyz\Zed\AntelopeGui\Communication\Table\PyzAntelope $antelopeEntity
         */
        foreach ($antelopeEntityCollection as $antelopeEntity) {
            $dataRow = $antelopeEntity->toArray();
            $deleteUrl = static::ANTELOPEGUI_DELETE_URL . '?idAntelope=' . $antelopeEntity->getIdAntelope();
            $dataRow[static::ACTIONS] = $this->generateRemoveButton(
                $deleteUrl,
                static::REMOVE,
                [
                    'id' => 'antelope-' . $antelopeEntity->getIdAntelope(),
                    'class' => 'remove-item',
                ],
            );

            $returns[] = $dataRow;
        }

        return $returns;
    }
}
