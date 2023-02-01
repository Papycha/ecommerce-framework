<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function test(): Response
    {
        return $this->render('\index\test.html.twig', [
            'controller_name' => 'testController'
        ]);
    }



    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('\index\index.html.twig', [
            'controller_name' => 'IndexController'
        ]);
    }



    #[Route('/produit', name: 'produit')]
    public function produit(): Response
    {
        return $this->render('\index\produit.html.twig', [
            'controller_name' => 'produitController'
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

    #[Route('/monPanier', name: 'monPanier')]
    public function monPanier(): Response
    {
        return $this->render('\index\monPanier.html.twig', [
            'controller_name' => 'monPanierController'
        ]);
    }















    // #[Route('/test', name: 'test')]
    // public function test(): Response
    // {
    //     return new Response('sdfsdf');
    // }
    #[Route('/shopList', name: 'shopList')]
    public function shopList(): Response
    {
        return $this->render('\index\shopList.html.twig', [
            'controller_name' => 'shopList',
            'title' => 'title of book',
            'description' => 'description',
            'price' => '100 '
        ]);
    }

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

    /**
     * @Route("/shopItem/{id<\d+>}", name="shopItem")
     *
     * @param ShopItems $shopItems
     * @return Response
     */
    public function shopItem(int $id): Response
    {
        return $this->render(
            'index/shopItem.html.twig',
            [
                'controller_name' => 'shopItem' . $id,
                'title' => 'titleshopItem',
                'description' => 'description',
                'price' => 'price',
                'id' => 'id',
            ]
        );
    }
}
