<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Orders;
use App\Form\ChangePasswordType;
use App\Repository\OrdersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Espace membre (sécurisé)
 */
class AccountController extends AbstractController
{
    #[Route('/compte', name: 'account')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig', []);
    }

    /**
     * Permet la modification du mot de passe d'un utilisateur sur une page dédiée
     */
    #[Route('/compte/modifier', name: 'account_modif')]
    public function changePassword(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $old_password = $form->get('old_password')->getData();
            $new_password = $form->get('new_password')->getData();
            $isOldPasswordValid = $passwordHasher->isPasswordValid($user, $old_password);
            if ($isOldPasswordValid) {
                $password = $passwordHasher->hashPassword($user, $new_password);
                $user->setPassword($password);
                $em->flush();

                return $this->redirectToRoute('account');
            }
        }

        return $this->render('account/password.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * Affiche la vue de toutes les commandes d'un utilisateur
     */
    #[Route('/compte/commandes', name: 'account_orders')]
    public function showOrders(OrdersRepository $repository): Response
    {
        $orders = $repository->findPaidOrdersByUser($this->getUser());
        return $this->render('account/orders.html.twig', [
            'orders' => $orders
        ]);
    }

    /**
     * Affiche une commande
     */
    #[Route('/compte/commandes/{reference}', name: 'account_order')]
    public function showOrder(Orders $order): Response
    {
        if (!$order || $order->getId() != $this->getUser()) {
            throw $this->createNotFoundException('Commande innaccessible');
        }
        return $this->render('account/order.html.twig', [
            'order' => $order
        ]);
    }
}
