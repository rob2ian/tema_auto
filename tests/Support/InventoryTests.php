<?php

declare(strict_types=1);

namespace Tests\Support;

use Codeception\Attribute\Given;
use Codeception\Attribute\When;
use Codeception\Attribute\Then;
use Tests\Support\AcceptanceTester;
use Tests\Support\Page\Acceptance\InventoryPage;


class InventoryTests extends Step\Acceptance\Inventory
{
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @When /I go to Inventory page by URL/
     */
    public function goToInventoryPageByURL(): void
    {
        $this->accessInventoryPage();
    }

    /**
     * @Then /I see the Inventory page/
     */
    public function seeInventoryPage(): void
    {
        $this->seeIamLoggedHome();
    }

    /**
     * @When /I logout/
     */
    public function Logout(): void
    {
        $this->clickMenu();
        $this->clickLogout();
    }

    /**
     * @When /I reset app/
     */
    public function resetAppState(): void
    {
        $this->clickMenu();
        $this->resetApp();
    }

    /**
     * @When /I sort products by "([^"]+)" in "([^"]+)" order/
     */
    public function sortProductsBy(string $type, string $order): void
    {
        if (($type == 'price') && ($order == 'ascending')) {
            $filter = InventoryPage::$filterPriceAscending;
        } else if (($type == 'price') && ($order == 'descending')) {
            $filter = InventoryPage::$filterPriceDescending;
        } else if (($type == 'name') && ($order == 'ascending')) {
            $filter = InventoryPage::$filterNameAscending;
        } else if (($type == 'name') && ($order == 'descending')) {
            $filter = InventoryPage::$filterNameDescending;
        } else {
            exit("Type or order of sorting is non-existing.");
        }
        $this->sortProducts($filter);
    }

    /**
     * @When /^I add ([0-9]) products to the cart$/
     */
    public function addProductsToCart($numberOfProducts): void
    {
        //Array of product indexes
        $indexArray = range(1, 6);

        //Prepend index 1 to start of the array and eliminate index 0
        $indexArray = $this->offsetArray($indexArray);

        //Pick random product indexes
        $productIndexes = array_rand($indexArray, (int) $numberOfProducts);

        //Prepend index 1 to start of the array and eliminate index 0
        $productIndexes = $this->offsetArray($productIndexes);

        //Grab the product details and price and store them in test data files
        $this->grabAndExportProductsDetails($productIndexes);

        //Clicking each product by index and adding it to the cart
        for ($i = 1; $i <= $numberOfProducts; $i++) {
            $this->addProduct($productIndexes[$i]);
        }
    }

    /**
     * @When /^I delete ([0-9]) products$/
     */
    public function deleteProducts($numberOfProducts): void
    {
        //Read the products indexes file and dump data in array
        $productIndexes = $this->importFromTestDataFile('products_indexes.txt');

        //Delete whatever product indexes are stored first in the array, dictated by $numberOfProducts 
        //Clicking each product by index and deleting it from the cart
        //Then delete the index from the product indexes array
        for ($i = 1; $i <= $numberOfProducts; $i++) {
            $this->deleteProduct($productIndexes[$i]);
            unset($productIndexes[$i]);
        }
        //Reindex the product indexes array
        $productIndexes = array_values($productIndexes);

        $productIndexes = $this->offsetArray($productIndexes);

        //Grab the product details and price and rewrite the test data files
        $this->grabAndExportProductsDetails($productIndexes);
    }

    /**
     * @When /^I go to the Cart page$/
     */
    public function goToCart(): void
    {
        $this->clickCart();
    }

    private function grabAndExportProductsDetails($productIndexes): void
    {
        //Write indexes in products indexes file
        $this->exportInTestDataFile('products_indexes.txt', $productIndexes);

        //Write products description file
        $this->grabAndExportProductsDescription('products_description.txt', $productIndexes);

        //Write products price file
        $this->grabAndExportProductsPrice('products_price.txt', $productIndexes);
    }

    private function grabAndExportProductsDescription($filename, $productIndexes): void
    {
        $productsDescription = [];
        for ($i = 1; $i <= count($productIndexes); $i++) {
            $description = $this->grabTextFrom(InventoryPage::getProductDescriptionById($productIndexes[$i]));
            $productsDescription[$i] = $description;
        }
        $this->exportInTestDataFile($filename, $productsDescription);
    }

    private function grabAndExportProductsPrice($filename, $productIndexes): void
    {
        $productsPrice = [];
        for ($i = 1; $i <= count($productIndexes); $i++) {
            $price = $this->grabTextFrom(InventoryPage::getProductPriceById($productIndexes[$i]));
            $productsPrice[$i] = $price;
        }
        $this->exportInTestDataFile($filename, $productsPrice);
    }
}
