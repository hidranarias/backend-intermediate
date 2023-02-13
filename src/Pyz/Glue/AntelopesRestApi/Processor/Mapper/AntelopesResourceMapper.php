<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestAntelopesAttributesTransfer;

class AntelopesResourceMapper implements AntelopesResourceMapperInterface
{
    public function mapAntelopeDataToAntelopeRestAttributes(array $antelopeData): RestAntelopesAttributesTransfer
    {
        return (new RestAntelopesAttributesTransfer())->fromArray($antelopeData, true);
    }

    /**
     * @param array $antelopeData
     *
     * @return array<\Generated\Shared\Transfer\RestAntelopesAttributesTransfer>
     */
    public function mapAntelopesDataToAntelopeRestAttributes(array $antelopeData): array
    {
        $data = [];
        foreach ($antelopeData as $antelope) {
            $data[] = (new RestAntelopesAttributesTransfer())->fromArray($antelope, true);
        }

        return $data;
    }
}
