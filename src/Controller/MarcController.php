<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class MarcController extends AbstractController
{
    #[Route('/marc', name: 'marc_index', methods: ['GET'])]
    public function index(HttpClientInterface $httpClient): Response
    {
        // Define a small set of popular currencies to display against USD
        $currencies = ['EUR', 'GBP', 'JPY', 'CAD', 'CHF', 'AUD'];
        $symbols = implode(',', $currencies);

        $rates = [];
        $error = null;

        try {
            $response = $httpClient->request('GET', 'https://api.exchangerate.host/latest', [
                'query' => [
                    'base' => 'USD',
                    'symbols' => $symbols,
                ],
                'timeout' => 5.0,
            ]);

            if (200 === $response->getStatusCode()) {
                $data = $response->toArray(false);
                if (isset($data['rates']) && is_array($data['rates'])) {
                    foreach ($currencies as $code) {
                        $rates[$code] = $data['rates'][$code] ?? null;
                    }
                } else {
                    $error = 'Unexpected response format from exchange service.';
                }
            } else {
                $error = 'Failed to fetch exchange rates (HTTP '.$response->getStatusCode().').';
            }
        } catch (\Throwable $e) {
            // Be graceful in case of network/API errors
            $error = 'Unable to retrieve exchange rates at the moment.';
        }

        return $this->render('marc/index.html.twig', [
            'base' => 'USD',
            'rates' => $rates,
            'currencies' => $currencies,
            'error' => $error,
        ]);
    }
}

