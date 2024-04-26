<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\LoginPage;

class Login extends \Tests\Support\AcceptanceTester
{

    public function login($username, $password): void
    {
        $I = $this;
        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$loginButton);
    }

    public function seeIamLoggedOut(): void
    {
        $this->seeCurrentUrlEquals(LoginPage::$URL);
        $this->seeElement(LoginPage::$usernameField);
        $this->seeElement(LoginPage::$passwordField);
        $this->seeElement(LoginPage::$loginButton);
    }

    public function seeUsernameError(): void
    {
        $this->see(LoginPage::$mandatoryUserError, LoginPage::$errorContainer);
    }

    public function seePasswordError(): void
    {
        $this->see(LoginPage::$mandatoryPasswordError, LoginPage::$errorContainer);
    }

    public function seeWrongCredentialsError(): void
    {
        $this->see(LoginPage::$wrongCredentialsError, LoginPage::$errorContainer);
    }

    public function seeForbiddenError(): void
    {
        $this->see(LoginPage::$forbiddenError, LoginPage::$errorContainer);
    }
}
