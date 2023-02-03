<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    // #[Route('/test', name: 'test')]
    // public function test(): Response
    // {
    //     return $this->render('\index\test.html.twig', [
    //         'controller_name' => 'testController'
    //     ]);
    // }



    #[Route('/', name: 'index')]
    public function index(ProduitRepository $ProduitRepository): Response
    {
        $items = $ProduitRepository->findAll();
        return $this->render('\index\index.html.twig', [
            'title' => 'Books',
            'items' => $items
        ]);
    }


    /**
     
     *
     * @param Produit $id
     * @return Response
     */

    #[Route('/produit/{id<\d+>}', name: 'produit')]
    public function produit(Produit $id): Response
    {
        // $id = $Produit->findOneById($Produit->getId());
        //$items = $Produit->find($id);
        return $this->render('\index\produit.html.twig', [
            'titre' => $id->getTitre(),
            // 'description' => $id->getDescription(),
            // 'price' => $id->getPrice(),
            'editeur' => $id->getEditeur(),
            'auteur' => $id->getAuteur(),
            'genre' => $id->getGenre(),
            'resume' => $id->getResume(),
            'nombrePages' => $id->getNombrePages(),
            'isbn' => $id->getIsbn(),

            // 'id' => $Produit->getId()

        ]);
    }


    #[Route('/monPanier', name: 'monPanier')]
    public function monPanier(): Response
    {
        return $this->render('\index\monPanier.html.twig', [
            'controller_name' => 'monPanierController'
        ]);
    }



















    #[Route('/connexion', name: 'connexion')]
    public function connexion(): Response
    {
        return $this->render('\index\connexion.html.twig', [
            'controller_name' => 'connexionController'
        ]);
    }

    #[Route('/creerCompteP', name: 'creerCompteP')]
    public function creerCompteP(): Response
    {
        return $this->render('\index\creerCompteP.html.twig', [
            'controller_name' => 'creerComptePController'
        ]);
    }

    #[Route('/creerCompteEnt', name: 'creerCompteEnt')]
    public function creerCompteEnt(): Response
    {
        return $this->render('\index\creerCompteEnt.html.twig', [
            'controller_name' => 'creerCompteEntController'
        ]);
    }

    #[Route('/motDePasseOublie', name: 'motDePasseOublie')]
    public function motDePasseOublie(): Response
    {
        return $this->render('\index\motDePasseOublie.html.twig', [
            'controller_name' => 'motDePasseOublieController'
        ]);
    }

    #[Route('/motDePasseOublieEnvoye', name: 'motDePasseOublieEnvoye')]
    public function motDePasseOublieEnvoye(): Response
    {
        return $this->render('\index\motDePasseOublieEnvoye.html.twig', [
            'controller_name' => 'motDePasseOublieEnvoyeController'
        ]);
    }


















    // #[Route('/shopList', name: 'shopList')]
    // public function shopList(): Response
    // {
    //     return $this->render('\index\shopList.html.twig', [
    //         'controller_name' => 'shopList',
    //         'title' => 'title of book',
    //         'description' => 'description',
    //         'price' => '100 '
    //     ]);
    // }

    // #[Route('/shopItem/{id}', name: 'shopItem')]
    // /**
    //  * @param int $id
    //  */
    // public function shopItem(int $id): Response
    // // public function shopItem(): Response
    // {
    //     return $this->render('index/shopItem.html.twig', [
    //         'controller_name' => 'shopItem' . ' ' . $id,
    //         // 'controller_name' => 'shopItem',
    //         'title' => 'title of book',
    //         'description' => 'description',
    //         'price' => '100 '
    //     ]);
    // }

    // /**
    //  * @Route("/shop/item/{id<\d+>}", name="shopItem")
    //  *
    //  * @param int $id
    //  * @return Response
    //  */
    // public function shopItem(int $id): Response
    // {
    //     return $this->render(
    //         'index/shopItem.html.twig',
    //         [
    //             'controller_name' => 'shopItem' . $id,

    //         ]
    //     );
    // }
}
