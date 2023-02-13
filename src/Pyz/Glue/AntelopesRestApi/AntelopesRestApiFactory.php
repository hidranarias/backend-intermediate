<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi;

use Pyz\Client\Antelope\AntelopeClientInterface;
use Pyz\Glue\AntelopesRestApi\Processor\Antelopes\AntelopesReader;
use Pyz\Glue\AntelopesRestApi\Processor\Antelopes\AntelopesReaderInterface;
use Pyz\Glue\AntelopesRestApi\Processor\Mapper\AntelopesResourceMapper;
use Spryker\Glue\Kernel\AbstractFactory;

class AntelopesRestApiFactory extends AbstractFactory
{
    public function createAntelopesReader(): AntelopesReaderInterface
    {
        return new AntelopesReader(
            $this->getAntelopeClient(),
            $this->getResourceBuilder(),
            $this->createAntelopeResourceMapper(),
        );
    }

    public function getAntelopeClient(): AntelopeClientInterface
    {
        return $this->getProvidedDependency(AntelopesRestApiDependencyProvider::CLIENT_ANTELOPE);
    }

    public function createAntelopeResourceMapper(): AntelopesResourceMapper
    {
        return new AntelopesResourceMapper();
    }
}
