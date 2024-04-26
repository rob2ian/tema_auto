<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use Tests\Support\AcceptanceTester;

class CheckoutStepTwoTests extends Step\Acceptance\CheckoutStepTwo
{
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @When /^I go to Checkout step two page by URL$/
     */
    public function checkoutStepTwoByURL(): void
    {
        $this->accessCheckoutStepTwo();
    }

    /**
     * @Then /^I see the Checkout step two page$/
     */
    public function seeCheckoutStepTwoPage(): void
    {
        $this->seeCheckOutStepTwo();
    }

    /**
     * @Then /^I see the order details are correct$/
     */
    public function checkOrderDetails(): void
    {
        //Check nr. of products vs. what was added on Inventory Page
        $nrOfProducts = count($this->importFromTestDataFile('products_indexes.txt'));
        $this->checkItemsCount($nrOfProducts);

        //Check each description for each product vs. Inventory Page
        $productsDescription = $this->importFromTestDataFile('products_description.txt');
        for ($i = 1; $i <= count($productsDescription); $i++) {
            $this->checkProductDescription($productsDescription[$i], $i);
        }
        
        //Check price for each product vs. Inventory Page
        $productsPrice = $this->importFromTestDataFile('products_price.txt');
        for ($i = 1; $i <= count($productsPrice); $i++) {
            $this->checkProductPrice($productsPrice[$i], $i);
        }

        //Check payment info vs. payment data file
        $payment_info = $this->importFromTestDataFile('payment_info.txt');
        $this->checkPaymentInfo($payment_info);

        //Check shipping info vs. shipping data file
        $shipping_info = $this->importFromTestDataFile('shipping_info.txt');
        //echo 'Shipping from file is:'.$shipping_info;
        $this->checkShippingInfo($shipping_info);

        //Check item total vs. total price from data file
        $price_total = $this->importFromTestDataFile('price_total.txt');
        $this->checkPriceTotal($price_total);

        //Write tax in tax data file, as it may vary (depends of the random products added)
        $tax_amount = preg_replace("/[^0-9.]/", "", $this->grabTaxAmount());
        $this->exportInTestDataFile('tax_amount.txt', $tax_amount);

        //Check total amount for order is correct
        $total_order = bcadd((string)$price_total, $tax_amount, 2);
        $this->checkTotalOrder($total_order);

    }

    /**
     * @When /I click the Finish button$/
     */
    public function finishOrder(): void
    {
        $this->clickFinish();
    }
}