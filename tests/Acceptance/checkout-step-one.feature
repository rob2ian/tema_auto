Feature: Checkout step one validations
    In order to place a succesful order
    As a standard user
    I need to enter my personal info correctly.

    Background: Login, add products and proceed to Checkout
        When I login with username "standard_user" and password "secret_sauce"
        And I add 4 products to the cart
        And I go to the Cart page
        And I go to Checkout

    Scenario: Personal info fields are filled correctly
        When I fill the first name with "Standard"
        And I fill the last name with "User"
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see the Checkout step two page
        And I reset app state

    Scenario: First name is empty
        When I fill the first name with ""
        And I fill the last name with "User"
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see error for mandatory first name
        And I reset app state

    Scenario: Last name is empty
        When I fill the first name with "Standard"
        And I fill the last name with ""
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see error for mandatory last name
        And I reset app state

    Scenario: Postal Code is empty
        When I fill the first name with "Standard"
        And I fill the last name with "User"
        And I fill the zip code with ""
        And I click the Continue button
        Then I see error for mandatory zip code
        And I reset app state

    # Ultimele doua scenarii nu trec, in mod corect, fiindca nu exista implementata 
    # validare pe tipul de date al campurilor, in aplicatie
    Scenario: First name contains numbers and special characters
        When I fill the first name with "$t&nd3rd"
        And I fill the last name with "User"
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see error for alphabetical-only first name
        And I reset app state

    Scenario: Last name contains numbers and special characters
        When I fill the first name with "Standard"
        And I fill the last name with "U$3r"
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see error for alphabetical-only last name
        And I reset app state