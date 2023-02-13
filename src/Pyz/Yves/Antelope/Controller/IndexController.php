<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Antelope\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;

/**
 * @method \Pyz\Client\Antelope\AntelopeClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(string $name): View
    {
        $antelope = $this->getClient()->getAntelopeByName($name);

        return $this->view(
            [
                'antelope' => $antelope,
            ],
            [],
            '@Antelope/views/index/index.twig',
        );
    }
}
