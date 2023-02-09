<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Training\Stub;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class TrainingStub extends ZedRequestStub
{
    public function findAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\AntelopeResponseTransfer $antelopeResponseTransfer */
        $antelopeResponseTransfer = $this->zedStub->call('/training/gateway/find-antelope', $antelopeCriteria);

        return $antelopeResponseTransfer;
    }
}
