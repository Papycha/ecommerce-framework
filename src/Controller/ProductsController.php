<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsDetailsRepository;
use App\Repository\ProductsRepository;
// use App\Entity\ProductsDetails;
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
    public function details(Products $product, ProductsDetailsRepository $productsDetailsRepository, ProductsRepository $productsRepository): Response
    {
        //dd ($product);
        // return $this->render('products/details.html.twig', compact('product'));
        return $this->render('products/details.html.twig', [
            'id' => $product->getId(),
            'product' => $product,
            'prix' => $productsRepository->findOneBy(['id' => $product->getId()])

        ]);
    }
}
