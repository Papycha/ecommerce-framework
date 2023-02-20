<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProductsController extends AbstractController
{
    #[Route('/produits', name: 'products_index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig');
    }


    #[Route('/produit/{id}', name: 'product_details')]
    public function details(Products $product): Response
    {
        //dd ($product);
        // return $this->render('products/details.html.twig', compact('product'));
        return $this->render('products/details.html.twig', [
            'product' => $product
        ]);
    }
}
