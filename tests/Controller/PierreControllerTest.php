<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PierreControllerTest extends WebTestCase
{
    public function testPierreRouteLoadsAndShowsTable(): void
    {
        $client = static::createClient();
        $client->request('GET', '/en/pierre');

        $this->assertResponseIsSuccessful('The /en/pierre page should load successfully.');
        $this->assertSelectorTextContains('h1', 'Paris → Antibes: Travel Alternatives');
        $this->assertSelectorExists('table');
        $this->assertSelectorTextContains('table thead', 'Highways');
        $this->assertSelectorTextContains('table thead', 'Distance (km)');
        $this->assertSelectorTextContains('table thead', 'Est. Time');
    }
}

