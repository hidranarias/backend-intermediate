<?php

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Pyz\Zed\AntelopeSearch\Business\AntelopeSearchFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method AntelopeSearchFacadeInterface getFacade()
 */
class AntelopeWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @param array<EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     * @api
     *
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        $this->getFacade()
            ->writeCollectionByAntelopeEvents($eventEntityTransfers);
    }

    /**
     * {@inheritDoc}
     *
     * @return string[]
     * @api
     *
     */
    public function getSubscribedEvents(): array
    {
        return [
            AntelopeSearchConfig::ANTELOPE_PUBLISH,
            AntelopeSearchConfig::ENTITY_PYZ_ANTELOPE_CREATE,
            AntelopeSearchConfig::ENTITY_PYZ_ANTELOPE_UPDATE,
        ];
    }
}
