<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\CartPage;

class Cart extends \Tests\Support\AcceptanceTester
{
    public function seeIamOnCartPage(): void
    {
        $this->seeCurrentUrlEquals(CartPage::$URL);
        $this->see(CartPage::$second_title_text, CartPage::$second_title_container);
        $this->seeElement(CartPage::$checkoutBtn);
        $this->seeElement(CartPage::$continueShoppingBtn);
    }

    public function deleteProduct($id): void
    {
        $this->click(CartPage::getProductRemoveBtnById($id));
    }

    public function clickCheckout(): void
    {
        $this->click(CartPage::$checkoutBtn);
    }

    public function clickContinueShopping(): void
    {
        $this->click(CartPage::$continueShoppingBtn);
    }

    public function checkItemsCount($nr): void
    {
        $this->seeNumberOfElements(CartPage::$cartItems, $nr);
    }

    public function checkProductDescription($description, $id): void
    {
        $this->see($description, CartPage::getProductDescriptionById($id)); 
    }

    public function checkProductPrice($price, $id): void
    {
        $this->see($price, CartPage::getProductPriceById($id)); 
    }
    
}