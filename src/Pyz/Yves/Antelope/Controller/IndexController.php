<?php

namespace Pyz\Yves\Antelope\Controller;

use Pyz\Client\Antelope\AntelopeClientInterface;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;

/**
 * @method AntelopeClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return View
     */
    public function indexAction(string $name): View
    {
        $antelope = $this->getClient()->getAntelopeByName($name);

        return $this->view(
            [
                'antelope' => $antelope,
            ],
            [],
            '@Antelope/views/index/index.twig'
        );
    }
}
