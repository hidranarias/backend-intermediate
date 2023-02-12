<?php

namespace Pyz\Shared\AntelopeSearch;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class AntelopeSearchConfig extends AbstractBundleConfig
{
    /**
     * Specification:
     * - Defines queue name as used for processing antelope publish messages.
     *
     * @api
     *
     * @var string
     */
    public const ANTELOPE_PUBLISH_SEARCH_QUEUE = 'publish.search.antelope';

    /**
     * Specification:
     * - Defines queue name as used for processing antelope sync messages.
     *
     * @api
     *
     * @var string
     */
    public const ANTELOPE_SYNC_SEARCH_QUEUE = 'sync.search.antelope';

    /**
     * Specification:
     * - Represents pyz_antelope entity creation event.
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_PYZ_ANTELOPE_CREATE = 'Entity.pyz_antelope.create';

    /**
     * Specification:
     * - Represents pyz_antelope entity change event.
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_PYZ_ANTELOPE_UPDATE = 'Entity.pyz_antelope.update';

    /**
     * Specification:
     * - Represents pyz_antelope entity deletion event.
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_PYZ_ANTELOPE_DELETE = 'Entity.pyz_antelope.delete';

    /**
     * Specification:
     * - This event is used for antelope publishing.
     *
     * @api
     *
     * @var string
     */
    public const ANTELOPE_PUBLISH = 'AntelopeSearch.antelope.publish';

    /**
     * Specification:
     * - This event is used for antelope unpublishing.
     *
     * @api
     */
    public const ANTELOPE_UNPUBLISH = 'AntelopeSearch.antelope.unpublish';
}
