<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\CheckoutStepTwoPage;

class CheckoutStepTwo extends \Tests\Support\AcceptanceTester
{

    public function seeCheckoutStepTwo(): void
    {
        $this->seeCurrentUrlEquals(CheckoutStepTwoPage::$URL);
        $this->see(CheckoutStepTwoPage::$second_title_text, CheckoutStepTwoPage::$second_title_container);
        $this->seeElement(CheckoutStepTwoPage::$FinishBtn);
        $this->seeElement(CheckoutStepTwoPage::$cancelBtn);
    }

    public function accessCheckoutStepTwo()
    {
        $this->amOnPage(CheckoutStepTwoPage::$URL);
    }

    public function checkItemsCount($nr): void
    {
        $this->seeNumberOfElements(CheckoutStepTwoPage::$cartItems, $nr);
    }

    public function checkProductDescription($description, $id): void
    {
        $this->see($description, CheckoutStepTwoPage::getProductDescriptionById($id)); 
    }

    public function checkProductPrice($price, $id): void
    {
        $this->see($price, CheckoutStepTwoPage::getProductPriceById($id)); 
    }

    public function checkPaymentInfo($info): void
    {
        $this->see($info, CheckoutStepTwoPage::$payment_info);
    }

    public function checkShippingInfo($info): void
    {
        $this->see($info, CheckoutStepTwoPage::$shipping_info);
    }

    public function checkPriceTotal($price): void
    {
        $this->see((string)$price, CheckoutStepTwoPage::$item_total);
    }

    public function grabTaxAmount(): string
    {
        return $this->grabTextFrom(CheckoutStepTwoPage::$tax_amount);
    }

    public function checkTotalOrder($total): void
    {
        $this->see($total, CheckoutStepTwoPage::$total);
    }

    public function clickCancel(): void
    {
        $this->click(CheckoutStepTwoPage::$cancelBtn);
    }

    public function clickFinish(): void
    {
        $this->click(CheckoutStepTwoPage::$FinishBtn);
    }
    
}