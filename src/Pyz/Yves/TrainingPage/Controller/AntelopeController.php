<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\TrainingPage\Controller;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Spryker\Yves\Kernel\View\View;
use SprykerShop\Yves\ShopApplication\Controller\AbstractController;

/**
 * @method \Pyz\Yves\TrainingPage\TrainingPageFactory getFactory()
 */
class AntelopeController extends AbstractController
{
    public function getAction(string $name): View
    {
        $antelopeCriteriaTransfer = new AntelopeCriteriaTransfer();
        $antelopeCriteriaTransfer->setName($name);

        $antelopeResponseTransfer = $this->getFactory()
            ->getTrainingClient()
            ->findAntelope($antelopeCriteriaTransfer);
        $currentStore = $this->getFactory()
            ->getStoreClient()
            ->getCurrentStore();

        return $this->view(
            [
                'antelope' => $antelopeResponseTransfer->getAntelope(),
                'store' => $currentStore,
            ],
            [],
            '@TrainingPage/views/antelope/get.twig',
        );
    }
}
