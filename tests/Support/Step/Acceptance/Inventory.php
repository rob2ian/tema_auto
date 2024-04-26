<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\InventoryPage;

class Inventory extends \Tests\Support\AcceptanceTester
{

    public function seeIamLoggedHome(): void
    {
        $this->seeCurrentUrlEquals(InventoryPage::$URL);
        $this->see(InventoryPage::$title_text, InventoryPage::$title_container);
        $this->seeElementInDOM(InventoryPage::$logoutSideButton);
        $this->seeElement(InventoryPage::$shoppingCart);
    }

    public function accessInventoryPage(): void
    {
        $this->amOnPage(InventoryPage::$URL);
    }

    public function sortProducts($filter): void
    {
        $I = $this;
        $I->selectOption(InventoryPage::$productFilter, $filter);
    }

    public function addProduct($id): void
    {
        $this->click(InventoryPage::getProductAddBtnById($id));
    }

    public function deleteProduct($id): void
    {
        $this->click(InventoryPage::getProductRemoveBtnById($id));
    }

    public function clickCart(): void
    {
        $this->click(InventoryPage::$shoppingCart);
    }

    public function clickMenu(): void
    {
        $this->click(InventoryPage::$menuButton);
    }

    public function closeMenu(): void
    {
        $this->click(InventoryPage::$menuCloseButton);
    }

    public function clickLogout(): void
    {
        $this->waitForElementClickable(InventoryPage::$logoutSideButton);
        $this->click(InventoryPage::$logoutSideButton);
    }

    public function resetApp(): void
    {
        $this->waitForElementClickable(InventoryPage::$resetAppBtn);
        $this->click(InventoryPage::$resetAppBtn);
        self::closeMenu();
    }
}
