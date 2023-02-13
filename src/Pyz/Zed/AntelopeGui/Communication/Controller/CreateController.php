<?php

namespace Pyz\Zed\AntelopeGui\Communication\Controller;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\AntelopeGui\Communication\AntelopeGuiCommunicationFactory;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AntelopeGuiCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{
    protected const URL_ANTELOPE_OVERVIEW = '/antelope-gui';

    protected const MESSAGE_ANTELOPE_CREATED_SUCCESS = 'Antelope was successfully created.';
    protected const MESSAGE_ANTELOPE_CREATED_FAILURE = 'Antelope already exists';

    public function indexAction(Request $request): array|RedirectResponse
    {
        $antelopeCreateForm = $this->getFactory()
            ->createAntelopeCreateForm(new AntelopeTransfer())
            ->handleRequest($request);

        if ($antelopeCreateForm->isSubmitted() && $antelopeCreateForm->isValid()) {
            return $this->createAntelope($antelopeCreateForm);
        }

        return $this->viewResponse([
            'antelopeCreateForm' => $antelopeCreateForm->createView(),
            'backUrl' => $this->getAntelopeOverviewUrl(),
        ]);
    }

    protected function createAntelope(FormInterface $antelopeCreateForm): RedirectResponse
    {
        $antelopeTransfer = $antelopeCreateForm->getData();

        $antelope = $this->getFactory()->getAntelopeFacade()->findAntelope($antelopeTransfer);
        if ($antelope && $antelope->getIdAntelope()) {
            $this->addErrorMessage(static::MESSAGE_ANTELOPE_CREATED_FAILURE);
            return $this->redirectResponse($this->getAntelopeOverviewUrl());
        }

        $this->getFactory()
            ->getAntelopeFacade()
            ->createAntelope($antelopeTransfer);

        $this->addSuccessMessage(static::MESSAGE_ANTELOPE_CREATED_SUCCESS);

        return $this->redirectResponse($this->getAntelopeOverviewUrl());
    }

    protected function getAntelopeOverviewUrl(): string
    {
        return Url::generate(static::URL_ANTELOPE_OVERVIEW);
    }
}
