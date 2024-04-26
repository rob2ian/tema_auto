Feature: Order placement complete flow
    In order to place a succesful order
    As a standard user
    I need to login into my account, add products to cart, enter my personal info and pay.

    Scenario: Complete a full order flow
        When I login with username "standard_user" and password "secret_sauce"
        And I sort products by "price" in "ascending" order
        And I add 4 products to the cart
        And I delete 2 products
        And I go to the Cart page
        Then I see the products details are correct
        And I go to Checkout
        And I fill the first name with "Standard"
        And I fill the last name with "User"
        And I fill the zip code with "123"
        And I click the Continue button
        Then I see the order details are correct
        And I click the Finish button
        Then I see the order was completed
        And I click the Back Home button
        Then I see the Inventory page
        And I logout
        Then I see the Login page

    # Din nou ultimele 2 scenarii pica in mod corect, deoarece exista bug-uri in aplicatie, 
    # se pot plasa comenzi fara produse si/sau fara detaliile personale introduse
    Scenario: Skip to checkout to place an order without products
        When I login with username "standard_user" and password "secret_sauce"
        And I go to the Cart page
        And I go to Checkout
        Then I see the Cart page

    Scenario: Skip to checkout's second page to place an order without personal info
        When I login with username "standard_user" and password "secret_sauce"
        And I add 4 products to the cart
        And I go to the Cart page
        And I go to Checkout
        And I go to Checkout step two page by URL
        Then I see the Checkout step one page