<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use Tests\Support\AcceptanceTester;

class CheckoutStepOneTests extends Step\Acceptance\CheckoutStepOne
{
    public function _before(AcceptanceTester $I)
    {
    }

     /**
     * @Then /^I see the Checkout step one page$/
     */
    public function seeCheckoutStepOnePage(): void
    {
        $this->seeCheckOutStepOne();
    }

     /**
     * @When /^I fill the first name with "(.*)"$/
     */
    public function fillFirstName($name): void
    {
        $this->setFirstName($name);
    }

    /**
     * @When /^I fill the last name with "(.*)"$/
     */
    public function fillLastName($name): void
    {
        $this->setLastName($name);
    }

    /**
     * @When /^I fill the zip code with "(.*)"$/
     */
    public function fillZipCode($code): void
    {
        $this->setZipcode($code);
    }

    /**
     * @When /I click the Continue button$/
     */
    public function continueToStepTwo(): void
    {
        $this->clickContinue();
    }

    /**
     * @Then /I see error for mandatory first name$/
     */
    public function seeMandatoryFirstNameError(): void
    {
        $this->seeFirstNameError();
    }

    /**
     * @Then /I see error for mandatory last name/
     */
    public function seeMandatoryLastNameError(): void
    {
        $this->seeLastNameError();
    }

    /**
     * @Then /I see error for mandatory zip code/
     */
    public function seeMandatoryZipCodeError(): void
    {
        $this->seeZipCodeError();
    }

    /**
     * @Then /I see error for alphabetical-only first name/
     */
    public function seeAlphabeticalOnlyFirstNameError(): void
    {
        $this->seeTypeFirstNameError();
    }

    /**
     * @Then /I see error for alphabetical-only last name/
     */
    public function seeAlphabeticalOnlyLastNameError(): void
    {
        $this->seeTypeLastNameError();
    }
}
