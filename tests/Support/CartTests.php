<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use Tests\Support\AcceptanceTester;


class CartTests extends Step\Acceptance\Cart
{
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @Then /^I see the Cart page$/
     */
    public function seeCartPage(): void
    {
        $this->seeIamOnCartPage();
    }

    /**
     * @Then /^I see the products details are correct$/
     */
    public function checkProductsDetails(): void
    {
        //Check nr. of products vs. what was added on Inventory Page
        $nrOfProducts = count($this->importFromTestDataFile('products_indexes.txt'));
        $this->checkItemsCount($nrOfProducts);

        //Check each description for each product vs. Inventory Page
        $productsDescription = $this->importFromTestDataFile('products_description.txt');
        for ($i = 1; $i <= count($productsDescription); $i++) {
            $this->checkProductDescription($productsDescription[$i], $i);
        }
        
        //Check price for each product vs. Inventory Page and if ok added it to the Total Price
        $productsPrice = $this->importFromTestDataFile('products_price.txt');
        $total = 0;
        for ($i = 1; $i <= count($productsPrice); $i++) {
            $this->checkProductPrice($productsPrice[$i], $i);
            $price = trim($productsPrice[$i], '$'); 
            $total += $price;
        }
        //Export total to test data file
        $this->exportInTestDataFile('price_total.txt', $total);
    }

    /**
     * @When /^I go to Checkout$/
     */
    public function goToCheckout(): void
    {
        $this->clickCheckout();
    }
}
