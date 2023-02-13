<?php

namespace Pyz\Client\Antelope\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\Exists;
use Elastica\Query\MatchQuery;
use Generated\Shared\Transfer\SearchContextTransfer;
use Spryker\Client\SearchExtension\Dependency\Plugin\QueryInterface;
use Spryker\Client\SearchExtension\Dependency\Plugin\SearchContextAwareQueryInterface;

class AntelopeQueryPlugin implements QueryInterface, SearchContextAwareQueryInterface
{
    /**
     * @var string
     */
    protected const SOURCE_IDENTIFIER = 'page';
    /**
     * @var string
     */
    protected $name;
    /**
     * @var SearchContextTransfer
     */
    protected $searchContextTransfer;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSearchQuery()
    {
        $boolQuery = (new BoolQuery())
            ->addMust(
                new Exists('id_antelope')
            )
            ->addMust(
                new MatchQuery('name', $this->name)
            );

        return (new Query())
            ->setQuery($boolQuery);
    }

    /**
     * @inheritDoc
     */
    public function getSearchContext(): SearchContextTransfer
    {
        if (!$this->hasSearchContext()) {
            $this->setupDefaultSearchContext();
        }

        return $this->searchContextTransfer;
    }

    /**
     * @return bool
     */
    protected function hasSearchContext(): bool
    {
        return (bool)$this->searchContextTransfer;
    }

    /**
     * @return void
     */
    protected function setupDefaultSearchContext(): void
    {
        $searchContextTransfer = new SearchContextTransfer();
        $searchContextTransfer->setSourceIdentifier(static::SOURCE_IDENTIFIER);

        $this->searchContextTransfer = $searchContextTransfer;
    }

    /**
     * @inheritDoc
     */
    public function setSearchContext(SearchContextTransfer $searchContextTransfer): void
    {
        $this->searchContextTransfer = $searchContextTransfer;
    }
}
