<?php

declare(strict_types=1);

namespace Tests\Support\Page\Acceptance;

class CheckoutStepOnePage
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $URL = '/checkout-step-one.html';

    public static $title_container = 'div.app_logo';
    public static $second_title_container = '//span[@data-test="title"]';
    public static $logoutSideButton = 'a#logout_sidebar_link';
    public static $shoppingCart = 'div#shopping_cart_container a.shopping_cart_link';
    public static $continueBtn = 'input#continue';
    public static $cancelBtn = 'button#cancel';
    public static $menuButton = 'button#react-burger-menu-btn';
    public static $errorContainer = 'div.error-message-container h3';
    public static $mandatoryFirstNameError = 'Error: First Name is required';
    public static $mandatoryLastNameError = 'Error: Last Name is required';
    public static $mandatoryZipCodeError = 'Error: Postal Code is required';

    public static $typeFirstNameError = 'Error: First Name can be alphabetical only';
    public static $typeLastNameError = 'Error: Last Name can be alphabetical only';

    public static $firstNameField = 'input#first-name';
    public static $lastNameField = 'input#last-name';
    public static $zipPostalField = 'input#postal-code';

    public static $title_text = 'Swag Labs';
    public static $second_title_text = 'Checkout: Your Information';

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