<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeDataImport\Business\DataImportStep;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Pyz\Zed\AntelopeDataImport\Business\DataSet\AntelopeDataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AntelopeWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    /**
     * @return void
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $antelopeEntity = PyzAntelopeQuery::create();
        $name = $dataSet[AntelopeDataSetInterface::COLUMN_NAME];
        $color = $dataSet[AntelopeDataSetInterface::COLUMN_COLOR];
        $antelope = $antelopeEntity->filterByName($name)
            ->findOneOrCreate();
        if ($antelope->isNew() || $antelope->isModified()) {
            $antelope->setColor($color);
            $antelope->save();
        }
        $this->addPublishEvents(AntelopeSearchConfig::ANTELOPE_PUBLISH, $antelope->getIdAntelope());
    }
}
