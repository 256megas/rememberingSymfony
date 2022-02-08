<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoticiasController extends AbstractController
{
    #[Route('/noticias', name: 'noticias')]
    public function index(): Response
    {
        $noticias = [
            [
                'ID' => 1,
                'titulo'=> "Esta es la noticia UNO"
            ],
            [
                'ID' => 2,
                'titulo'=> "Esta es la noticia DOS"
            ],
            [
                'ID' => 3,
                'titulo'=> "Esta es la noticia TRES"
            ]
            
            ];
        return $this->render('noticias/index.html.twig', [
            'noticias' => $noticias,
        ]);
    }


    #[Route('/noticia/{id}', name: 'noticiaSingle',defaults:["id"=> 1] )]
    public function noticiaSingle($id): Response
    {
        return $this->render('noticias/single.html.twig', [
            'idNoticia' => $id,
        ]);
    }
}
