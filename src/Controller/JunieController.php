<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller used to handle Junie bot responses.
 */
final class JunieController extends AbstractController
{
    /**
     * Responds to the "Are you here my dear?" query.
     */
    #[Route('/junie', name: 'junie_response', methods: ['GET'])]
    public function respond(): Response
    {
        return $this->render('junie/response.html.twig', [
            'current_time' => new \DateTime(),
        ]);
    }
}