<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class AntelopesRestApiConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const RESOURCE_ANTELOPES = 'antelopes';

    /**
     * @var string
     */
    public const RESPONSE_CODE_CANT_FIND_ANTELOPE = '301';

    /**
     * @var string
     */
    public const RESPONSE_DETAIL_CANT_FIND_ANTELOPE = 'Antelope was not found.';

    /**
     * @var string
     */
    public const RESPONSE_CODE_ANTELOPE_NAME_IS_NOT_SPECIFIED = '311';

    /**
     * @var string
     */
    public const RESPONSE_DETAIL_ANTELOPE_NAME_IS_NOT_SPECIFIED = 'Antelope name is not specified.';
}
