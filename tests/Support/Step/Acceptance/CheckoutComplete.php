<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\Acceptance\CheckoutCompletePage;

class CheckoutComplete extends \Tests\Support\AcceptanceTester
{

    public function clickBackHome(): void
    {
        $this->click(CheckoutCompletePage::$backHomeBtn);
    }

    public function checkMessages(): void
    {
        $this->see(CheckoutCompletePage::$completedHeaderMessage, CheckoutCompletePage::$orderCompletedHeader);
        $this->see(CheckoutCompletePage::$completedTextMessage, CheckoutCompletePage::$orderCompletedText);
    }
    
}