<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Librairy;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibrairyController extends AbstractController
{
    #[Route('/', name: 'listing')]
    public function index(ManagerRegistry $doctrine) :Response
    {
        $listLibrairy = $doctrine->getRepository(Librairy::class)->findAll();

        return $this->render('listing/index.html.twig', [
            'listLibrairy' => $listLibrairy,
        ]);
    }

    #[Route('/librairy/{id}', name: 'librairy')]
    public function librairy(Librairy $librairy): Response
    {
        return $this->render('librairy/index.html.twig', [
            'librairy' => $librairy,
        ]);
    }

    #[Route('/librairy/{id}/{book}', name: 'book')]
    public function book(Librairy $librairy, Book $book): Response
    {
        return $this->render('librairy/book/index.html.twig', [
            'book' => $book,
        ]);
    }
}
