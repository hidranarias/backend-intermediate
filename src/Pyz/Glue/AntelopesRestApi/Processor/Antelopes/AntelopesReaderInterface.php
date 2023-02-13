<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi\Processor\Antelopes;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface AntelopesReaderInterface
{
    public function getAntelope(RestRequestInterface $restRequest): RestResponseInterface;

    public function getAntelopes(RestRequestInterface $restRequest): RestResponseInterface;

    public function findAntelopeByName(string $name, RestRequestInterface $restRequest): ?RestResourceInterface;
}
