<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Antelope;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Antelope\AntelopeFactory getFactory()
 */
class AntelopeClient extends AbstractClient implements AntelopeClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getAntelopeByName(string $name): array
    {
        $searchQuery = $this->getFactory()
            ->createAntelopeQueryPlugin($name);

        $resultFormatters = $this->getFactory()
            ->getSearchQueryFormatters();

        $searchResults = $this->getFactory()
            ->getSearchClient()
            ->search(
                $searchQuery,
                $resultFormatters,
            );

        return $searchResults['antelope'] ?? [];
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function getAntelopes(): array
    {
        $searchQuery = $this->getFactory()
            ->createAntelopeQueryPlugin();

        $resultFormatters = $this->getFactory()
            ->getSearchQueryResultsFormatter();

        $searchResults = $this->getFactory()
            ->getSearchClient()
            ->search(
                $searchQuery,
                $resultFormatters,
            );

        return $searchResults['antelopes'];
    }
}
