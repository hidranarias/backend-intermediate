<?php

namespace Pyz\Zed\AntelopeDataImport\Communication\Plugin\DataImport;


use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Pyz\Zed\AntelopeDataImport\AntelopeDataImportConfig;
use Pyz\Zed\AntelopeDataImport\Business\AntelopeDataImportFacadeInterface;
use Spryker\Zed\DataImport\Dependency\Plugin\DataImportPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;


/**
 * @method AntelopeDataImportFacadeInterface getFacade()
 */
class AntelopeDataImportPlugin extends AbstractPlugin implements DataImportPluginInterface
{

    public function import(?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null
    ): DataImporterReportTransfer {
        return $this->getFacade()->importAntelope($dataImporterConfigurationTransfer);
    }

    public function getImportType(): string
    {
        return AntelopeDataImportConfig::IMPORT_TYPE_ANTELOPE;
    }
}
