<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use Tests\Support\AcceptanceTester;

class CheckoutCompleteTests extends Step\Acceptance\CheckoutComplete
{
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @Then /I see the order was completed$/
     */
    public function seeOrderCompleted(): void
    {
        $this->checkMessages();
    }

    /**
     * @When /I click the Back Home button$/
     */
    public function goBackHome()
    {
        $this->clickBackHome();
    }

}