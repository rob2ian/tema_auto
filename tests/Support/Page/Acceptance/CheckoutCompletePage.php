<?php

declare(strict_types=1);

namespace Tests\Support\Page\Acceptance;

class CheckoutCompletePage
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $URL = '/checkout-complete';

    public static $title_container = 'div.app_logo';
    public static $logoutSideButton = 'a#logout_sidebar_link';
    public static $shoppingCart = 'div#shopping_cart_container a.shopping_cart_link';
    public static $backHomeBtn = 'button#back-to-products';
    public static $menuButton = 'button#react-burger-menu-btn';

    public static $title_text = 'Swag Labs';
    public static $completedHeaderMessage = 'Thank you for your order!';
    public static $completedTextMessage = 'Your order has been dispatched, and will arrive just as fast as the pony can get there!';

    public static $orderCompletedHeader = '//h2[@data-test="complete-header"]';
    public static $orderCompletedText = '//div[@data-test="complete-text"]';


    /**
     * @var \Tests\Support\AcceptanceTester;
     */

    protected $acceptanceTester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
        // you can inject other page objects here as well
    }
}
