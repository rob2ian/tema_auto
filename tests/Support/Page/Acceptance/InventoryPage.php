<?php

declare(strict_types=1);

namespace Tests\Support\Page\Acceptance;

class InventoryPage
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $URL = '/inventory.html';

    public static $title_container = 'div.app_logo';
    public static $logoutSideButton = 'a#logout_sidebar_link';
    public static $shoppingCart = 'div#shopping_cart_container a.shopping_cart_link';
    public static $productFilter = 'select.product_sort_container';
    public static $productList = '//div[@data-test="inventory-list"]';
    public static $menuButton = 'button#react-burger-menu-btn';
    public static $menuCloseButton = 'button#react-burger-cross-btn';
    public static $resetAppBtn = 'a#reset_sidebar_link';

    public static $title_text = 'Swag Labs';
    public static $filterNameAscending = 'Name (A to Z)';
    public static $filterNameDescending = 'Name (Z to A)';
    public static $filterPriceAscending = 'Price (low to high)';
    public static $filterPriceDescending = 'Price (high to low)';

    /**
     * @var \Tests\Support\AcceptanceTester;
     */

    protected $acceptanceTester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
        // you can inject other page objects here as well
    }
    
    public static function getProductById(int $id) 
    {
        return self::$productList.'/div[@data-test="inventory-item"]['.$id.']';
    }

    public static function getProductAddBtnById(int $id) 
    {
        return self::getProductById($id).'//button[contains(text(),"Add to cart")]';
    }

    public static function getProductRemoveBtnById(int $id) 
    {
        return self::getProductById($id).'//button[contains(text(),"Remove")]';
    }

    public static function getProductDescriptionById(int $id) 
    {
        return self::getProductById($id).'//div[@data-test="inventory-item-desc"]';
    }

    public static function getProductPriceById(int $id) 
    {
        return self::getProductById($id).'//div[@data-test="inventory-item-price"]';
    }
}