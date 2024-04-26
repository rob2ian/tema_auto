<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\CheckoutStepOnePage;

class CheckoutStepOne extends \Tests\Support\AcceptanceTester
{

    public function seeCheckoutStepOne(): void
    {
        $this->seeCurrentUrlEquals(CheckoutStepOnePage::$URL);
        $this->see(CheckoutStepOnePage::$second_title_text, CheckoutStepOnePage::$second_title_container);
        $this->seeElement(CheckoutStepOnePage::$continueBtn);
        $this->seeElement(CheckoutStepOnePage::$cancelBtn);
    }

    public function setFirstName($name): void
    {
        $this->fillField(CheckoutStepOnePage::$firstNameField, $name);
    }

    public function setLastName($name): void
    {
        $this->fillField(CheckoutStepOnePage::$lastNameField, $name);
    }

    public function setZipCode($name): void
    {
        $this->fillField(CheckoutStepOnePage::$zipPostalField, $name);
    }

    public function clickCancel(): void
    {
        $this->click(CheckoutStepOnePage::$cancelBtn);
    }

    public function clickContinue(): void
    {
        $this->click(CheckoutStepOnePage::$continueBtn);
    }

    public function seeFirstNameError(): void
    {
        $this->see(CheckOutStepOnePage::$mandatoryFirstNameError, CheckOutStepOnePage::$errorContainer);
    }

    public function seeLastNameError(): void
    {
        $this->see(CheckOutStepOnePage::$mandatoryLastNameError, CheckOutStepOnePage::$errorContainer);
    }

    public function seeZipCodeError(): void
    {
        $this->see(CheckOutStepOnePage::$mandatoryZipCodeError, CheckOutStepOnePage::$errorContainer);
    }

    public function seeTypeFirstNameError(): void
    {
        $this->see(CheckOutStepOnePage::$typeFirstNameError, CheckOutStepOnePage::$errorContainer);
    }

    public function seeTypeLastNameError(): void
    {
        $this->see(CheckOutStepOnePage::$typeLastNameError, CheckOutStepOnePage::$errorContainer);
    }
    
}