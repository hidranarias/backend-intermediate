<?php

namespace Pyz\Zed\AntelopeDataImport\Business\DataImportStep;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Pyz\Zed\AntelopeDataImport\Business\DataSet\AntelopeDataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AntelopeWriterStep implements DataImportStepInterface
{

    public function execute(DataSetInterface $dataSet)
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
    }
}
