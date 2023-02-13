<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Training\Presentation;

use PyzTest\Zed\Training\TrainingPresentationTester;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Zed
 * @group Training
 * @group Presentation
 * @group TrainingCest
 * Add your own group annotations below this line
 */
class TrainingCest
{
    /**
     * @var string
     */
    protected const URL = '/training/hello';

    /**
     * @return void
     */
    public function _before(TrainingPresentationTester $I): void
    {
    }

    // tests
    /**
     * @return void
     */
    public function tryToTest(TrainingPresentationTester $i): void
    {
        $i->amLoggedInUser();
        $i->amOnPage(static::URL);
        $i->see('hello');
    }
}
