<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\AntelopeGui\Communication\Controller;

use Exception;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\AntelopeGui\Communication\AntelopeGuiCommunicationFactory getFactory()
 */
class DeleteController extends AbstractController
{
    /**
     * @var string
     */
    protected const URL_ANTELOPE_OVERVIEW = '/antelope-gui';

    /**
     * @var string
     */
    protected const MESSAGE_ANTELOPE_CREATED_FAILURE = 'ID NOT FOUND';

    /**
     * @var string
     */
    protected const MESSAGE_ANTELOPE_DELETED = 'Antelope deleted';

    public function indexAction(Request $request): array|RedirectResponse
    {
        try {
            $antelopeTransfer = new AntelopeTransfer();
            $idAntelope = $this->castId($request->query->get('idAntelope'));
            if (!$idAntelope) {
                $this->addErrorMessage(static::MESSAGE_ANTELOPE_CREATED_FAILURE);

                return $this->redirectResponse($this->getAntelopeOverviewUrl());
            }
            $antelopeTransfer->setIdAntelope($idAntelope);
            $isAntelopeDeleted = $this->getFactory()->getAntelopeFacade()->deleteAntelope($antelopeTransfer);

            $this->setMessage($isAntelopeDeleted);
        } catch (Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirectResponse($this->getAntelopeOverviewUrl());
    }

    protected function getAntelopeOverviewUrl(): string
    {
        return Url::generate(static::URL_ANTELOPE_OVERVIEW);
    }

    /**
     * @param bool $isAntelopeDeleted
     *
     * @return void
     */
    public function setMessage(bool $isAntelopeDeleted): void
    {
        if (!$isAntelopeDeleted) {
            $this->addErrorMessage(static::MESSAGE_ANTELOPE_DELETED);
        } else {
            $this->addSuccessMessage(static::MESSAGE_ANTELOPE_DELETED);
        }
    }
}
