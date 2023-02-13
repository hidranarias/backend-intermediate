<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestAntelopesAttributesTransfer;

interface AntelopesResourceMapperInterface
{
    /**
     * @param array $antelopeData
     *
     * @return array<\Generated\Shared\Transfer\RestAntelopesAttributesTransfer>
     */
    public function mapAntelopesDataToAntelopeRestAttributes(array $antelopeData): array;

    public function mapAntelopeDataToAntelopeRestAttributes(array $antelopeData): RestAntelopesAttributesTransfer;
}
