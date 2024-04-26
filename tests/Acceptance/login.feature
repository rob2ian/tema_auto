Feature: Login
  In order to login in my account
  As a standard user
  I need to enter correctly my username and password

  Scenario: Login and logout as standard user
    When I login with username "standard_user" and password "secret_sauce"
    Then I see the Inventory page
    And I logout
    Then I see the Login page

  Scenario: Login with empty username
    When I login with username "" and password "secret_sauce"
    Then I see the Login page
    And I see error for mandatory username

  Scenario: Login with empty password
    When I login with username "standard_user" and password ""
    Then I see the Login page
    And I see error for mandatory password

  Scenario: Login with incorrect username
    When I login with username "standardd_userr" and password "secret_sauce"
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Login with incorrect password
    When I login with username "standard_user" and password "secrett_saucee"
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Login with valid username but containing spaces
    When I login with username " standard_user " and password "secret_sauce"
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Login with valid password but containing spaces
    When I login with username "standard_user" and password " secret_sauce "
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Login with valid username but in uppercase
    When I login with username "STANDARD_USER" and password "secret_sauce"
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Login with valid password but in uppercase
    When I login with username "standard_user" and password "SECRET_SAUCE"
    Then I see the Login page
    And I see error for non-existing credentials

  Scenario: Accesing inventory page without loging in, by URL
    When I go to Inventory page by URL
    Then I see the Login page
    And I see error for forbidden access



