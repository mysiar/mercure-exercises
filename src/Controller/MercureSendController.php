<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\SingleInputType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class MercureSendController extends AbstractController
{
    /**
     * @Route("/mercure/send", name="mercure_send")
     */
    public function index(Request $request, PublisherInterface $publisher): Response
    {
        $form = $this->createForm(SingleInputType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $publisher(new Update(
                'test',
                json_encode(['headline'=> $data['headline']])
            ));
            $form = $this->createForm(SingleInputType::class);
        }

        return $this->render('mercure_send/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
