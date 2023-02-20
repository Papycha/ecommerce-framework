<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriesController extends AbstractController
{
    #[Route('/categories/{name}', name: 'categorie_list')]
    public function list(Categories $category, ProductsRepository $productsRepository, Request $request): Response
    {
        //On va chercher le numéro de page dans l'url
        // $page = $request->query->getInt('page', 1);

        //On va chercher la liste des produits de la catégorie
        // $products = $productsRepository->findProductsPaginated($page, $category->getId(), 4);

        $products = $category->getProducts();

        return $this->render('categories/list.html.twig', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
