<?php

namespace App\Controller;

use App\Entity\Noticias;
use Doctrine\Persistence\ManagerRegistry;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoticiasController extends AbstractController
{
    #[Route('/noticias', name: 'noticias')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // $noticias = [
        //     [
        //         'ID' => 1,
        //         'titulo'=> "Esta es la noticia UNO"
        //     ],
        //     [
        //         'ID' => 2,
        //         'titulo'=> "Esta es la noticia DOS"
        //     ],
        //     [
        //         'ID' => 3,
        //         'titulo'=> "Esta es la noticia TRES"
        //     ]
            
        //     ];

        $entityManager = $doctrine->getManager();
        $news = $entityManager->getRepository(Noticias::class)->findAll();;


        if (!$news) {
            throw $this->createNotFoundException(
                'No noticias'
            );
        }

        // var_dump($news);
        // return new Response('Leemos de la base de datos');
        return $this->render('noticias/index.html.twig', [
        'noticias' => $news,
        ]);
        // return $this->render('noticias/index.html.twig', [
        //     'noticias' => $noticias,
        // ]);
    }


    #[Route('/noticia/{id}', name: 'noticiaSingle',defaults:["id"=> 1] )]
    public function noticiaSingle($id): Response
    {
        return $this->render('noticias/single.html.twig', [
            'idNoticia' => $id,
        ]);
    }


    #[Route('/createNoticia', name: 'createNoticia')]
    public function noticiaCreate(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $newCreate = new Noticias();
        $newCreate->setTitular('Nueva Noticia');
        $newCreate->setContenido('Este sera el texto de esta noticia');
        $newCreate->setFecha(new \DateTime());

        // tell Doctrine you want to (eventually) save the newCreate (no queries yet)
        $entityManager->persist($newCreate);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Guardamos la noticia con el id: '.$newCreate->getId());
    }

}
