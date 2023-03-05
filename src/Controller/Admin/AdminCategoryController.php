<?php

// namespace App\Controller\Admin;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

// class AdminCategoryController extends AbstractController
// {
//     public static function getEntityFqcn(): string
//     {
//         return Category::class;
//     }

//     public function configureCrud(Crud $crud): Crud
//     {
//         return $crud
//             ->setEntityLabelInSingular('Catégorie')
//             ->setEntityLabelInPlural('Catégories')
//         ;
//     }

//     public function configureFields(string $pageName): iterable
//     {
//         return [
//             TextField::new('name', 'Nom'),
//         ];
//     }
// }
