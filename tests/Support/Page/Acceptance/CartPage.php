<?php

declare(strict_types=1);

namespace Tests\Support\Page\Acceptance;

class CartPage
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $URL = '/cart.html';

    public static $title_container = 'div.app_logo';
    public static $second_title_container = '//span[@data-test="title"]';
    public static $logoutSideButton = 'a#logout_sidebar_link';
    public static $shoppingCart = 'div#shopping_cart_container a.shopping_cart_link';
    public static $cartList = '//div[@data-test="cart-list"]';
    public static $cartItems = '//div[@data-test="inventory-item"]';
    public static $continueShoppingBtn = 'button#continue-shopping';
    public static $checkoutBtn = 'button#checkout';
    public static $checkoutBtnDisabled = '//button[@id="checkout" and @disabled]';
    public static $menuButton = 'button#react-burger-menu-btn';

    public static $title_text = 'Swag Labs';
    public static $second_title_text = 'Your Cart';

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
        return self::$cartList.'/div[@data-test="inventory-item"]['.$id.']';
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