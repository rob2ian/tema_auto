<?php

declare(strict_types=1);

namespace Tests\Support\Page\Acceptance;

class LoginPage
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $URL = '/';

    public static $title_container = 'div.login_logo';
    public static $usernameField = 'input#user-name';
    public static $passwordField = 'input#password';
    public static $loginButton = 'input#login-button';
    public static $errorContainer = 'div.error-message-container h3';
    public static $mandatoryUserError = 'Epic sadface: Username is required';
    public static $mandatoryPasswordError = 'Epic sadface: Password is required';
    public static $wrongCredentialsError = 'Epic sadface: Username and password do not match any user in this service';
    public static $forbiddenError = 'Epic sadface: You can only access \'/inventory.html\' when you are logged in.';

    public static $title_text = 'Swag Labs';

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
