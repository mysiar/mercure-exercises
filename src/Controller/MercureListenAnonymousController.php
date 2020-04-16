<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MercureListenAnonymousController extends AbstractController
{
    /**
     * @Route("/mercure/listen_anonymous", name="mercure_listen_anonymous")
     */
    public function index(): Response
    {
        return $this->render(
            'mercure_listen/index.anonymous.html.twig',
            [
                'token' => $_ENV['MERCURE_JWT_TOKEN_SUBSCRIBER'],
                'url' => $_ENV['MERCURE_PUBLISH_URL'],
                'topic' => 'test',
            ]
        );
    }
}
