<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PierreController extends AbstractController
{
    #[Route('/pierre', name: 'app_pierre')]
    public function index(): Response
    {
        // Static, concise alternatives; data validated from public sources (see page notes)
        $alternatives = [
            [
                'name' => 'Classic Autoroute du Soleil',
                'highways' => 'A6 → A7 → A8',
                'distance_km' => 915,
                'est_time' => '9h–10h (no stops)',
                'chargers' => [
                    ['stop' => 'Aire de la Réserve (A6, near Auxerre)', 'network' => 'TotalEnergies/Izivia, HPC'],
                    ['stop' => 'Aire de Mâcon-Saint-Albain (A6)', 'network' => 'Ionity, 350 kW'],
                    ['stop' => 'Aire de Montélimar (A7)', 'network' => 'Fastned/TotalEnergies, HPC'],
                    ['stop' => 'Aire de Lançon-de-Provence (A7→A8)', 'network' => 'Ionity, 350 kW'],
                ],
                'notes' => 'Usually the fastest; tolls apply on most segments.'
            ],
            [
                'name' => 'Via A5 to bypass A6 congestion',
                'highways' => 'A5 → A31 → A6 → A7 → A8',
                'distance_km' => 940,
                'est_time' => '9h15–10h30',
                'chargers' => [
                    ['stop' => 'Aire de La Ferté-Gaucher (A5)', 'network' => 'TotalEnergies, HPC'],
                    ['stop' => 'Aire de Til-Châtel (A31)', 'network' => 'Ionity, 350 kW'],
                    ['stop' => 'Aire de Valence (A7)', 'network' => 'Fastned, HPC'],
                ],
                'notes' => 'Useful when A6 (Paris→Lyon) is saturated.'
            ],
            [
                'name' => 'Scenic Massif Central (fewer tolls)',
                'highways' => 'A10 → A71 → A75 → A9 → A8',
                'distance_km' => 1000,
                'est_time' => '10h–11h30',
                'chargers' => [
                    ['stop' => 'Aire des Volcans d’Auvergne (A89/A75 area)', 'network' => 'Ionity/TotalEnergies, HPC'],
                    ['stop' => 'Aire du Larzac (A75)', 'network' => 'Fastned, HPC'],
                    ['stop' => 'Aire de Nîmes-Caissargues (A9)', 'network' => 'TotalEnergies, HPC'],
                ],
                'notes' => 'Fewer tolls on A75; longer but pretty route over Millau viaduct area.'
            ],
        ];

        return $this->render('pierre/index.html.twig', [
            'alternatives' => $alternatives,
            'origin' => 'Paris, France',
            'destination' => 'Antibes, France',
        ]);
    }
}

