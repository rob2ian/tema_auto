<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use ReflectionClass;
use Tests\Support\AcceptanceTester;
use Tests\Support\Page\Acceptance\LoginPage;
use Tests\Support\Page\Acceptance\InventoryPage;
use Tests\Support\Step\Acceptance\Login;

class LoginTests extends Step\Acceptance\Login
{
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @When /I login with username "(.*)" and password "(.*)"/
     */
    public function loginAs(string $username, string $password): void
    {
        $this->login($username, $password);
    }

    /**
     * @Then /I see the Login page/
     */
    public function seeLoginPage(): void
    {
        $this->seeIamLoggedOut();
    }

    /**
     * @Then /I see error for mandatory username/
     */
    public function seeMandatoryUsernameError(): void
    {
        $this->seeUsernameError();
    }

    /**
     * @Then /I see error for mandatory password/
     */
    public function seeMandatoryPasswordError(): void
    {
        $this->seePasswordError();
    }

    /**
     * @Then /I see error for non-existing credentials/
     */
    public function seeNonExistingCredentialsError(): void
    {
        $this->seeWrongCredentialsError();
    }

    /**
     * @Then /I see error for forbidden access/
     */
    public function seeForbiddenAccessError(): void
    {
        $this->seeForbiddenError();
    }

}
