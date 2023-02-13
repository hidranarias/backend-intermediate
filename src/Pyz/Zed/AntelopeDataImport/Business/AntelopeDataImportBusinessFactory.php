<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeDataImport\Business;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Pyz\Zed\AntelopeDataImport\Business\DataImportStep\AntelopeWriterStep;
use Pyz\Zed\DataImport\Business\DataImportBusinessFactory;
use Spryker\Zed\DataImport\Business\Model\DataImporterInterface;

/**
 * @method \Pyz\Zed\AntelopeDataImport\AntelopeDataImportConfig getConfig()
 */
class AntelopeDataImportBusinessFactory extends DataImportBusinessFactory
{
    public function createAntelopeDataImport(
        ?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer,
    ): DataImporterInterface {
        $dataImporter = $this->getCsvDataImporterFromConfig($dataImporterConfigurationTransfer);
        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker->addStep($this->createWriterStep());
        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\AntelopeDataImport\Business\DataImportStep\AntelopeWriterStep
     */
    public function createWriterStep(): AntelopeWriterStep
    {
        return new AntelopeWriterStep();
    }
}
