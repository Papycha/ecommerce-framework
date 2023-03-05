<?php

namespace App\Controller;

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
class UserAccountController extends AbstractController
{
    #[Route('/compte', name: 'account')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig', []);
    }

    /**
     * Permet la modification du mot de passe d'un utilisateur sur une page dédiée
     */
    // #[Route('/compte/mot-de-passe', name: 'account_password')]
    // public function changePassword(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    // {
    //     $user = $this->getUser();
    //     $form = $this->createForm(ChangePasswordType::class, $user);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $old_password = $form->get('old_password')->getData();
    //         $new_password = $form->get('new_password')->getData();
    //         $isOldPasswordValid = $passwordHasher->isPasswordValid($user, $old_password);
    //         if ($isOldPasswordValid) {
    //             $password = $passwordHasher->hashPassword($user, $new_password);
    //             $user->setPassword($password);
    //             $em->flush();
    //             $this->addFlash(
    //                 'notice',
    //                 'Mot de passe modifié :)'
    //             );
    //             return $this->redirectToRoute('account');
    //         } else {
    //             $this->addFlash(
    //                 'notice',
    //                 'Mot de passe actuel erroné :('
    //             );
    //         }
    //     }

    //     return $this->render('account/password.html.twig', [
    //         'form' => $form
    //     ]);
    // }

    // #[Route('/mot-de-passe-oublie', name: 'reset_password')]
    // public function passeOublie(Request $request)
    // {
    //     if ($this->getUser()) {
    //         return $this->render('/account/index.html.twig');
    //     }

    // if ($request->get(key: 'email')) {
    //     dd($request->get(key: 'email'));
    // }

    //     return $this->render('reset_password/index.html.twig');
    // }

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
        if (!$order || $order->getUsers() != $this->getUser()) {
            throw $this->createNotFoundException('Commande innaccessible');
        }
        return $this->render('account/order.html.twig', [
            'order' => $order
        ]);
    }
}


    // #[Route('compte/adresses', name: 'account_address')]
    // public function showAdresses(): Response
    // {
    //     // Adresses récupérées directement dans la vue grâce à app.user
    //     return $this->render('account/address.html.twig', [
    //     ]);
    // }

    // #[Route('compte/adresses/ajouter', name: 'account_address_new')]
    // public function add(Request $request, EntityManagerInterface $em, SessionInterface $session): Response
    // {
    //     $address = new Address();
    //     $form = $this->createForm(AddressType::class, $address);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $address->setUser($this->getUser());

    //         $em->persist($address);
    //         $em->flush();
    //         if ($session->get('order') === 1) {       //Redirection vers la commande si celle-ci a été amorcée
    //             $session->set('order', 0);
    //             return $this->redirectToRoute('order');
    //         }
    //         return $this->redirectToRoute('account_address');
    //     }

    //     return $this->renderForm('account/address_form.html.twig', [
    //         'form' => $form
    //     ]);
    // }

    // #[Route('compte/adresses/modifier/{id}', name: 'account_address_update')]
    // public function update(Request $request, EntityManagerInterface $em, Address $address = null): Response
    // {
    //     if (!$address || $address->getUser() != $this->getUser()) {
    //         return $this->redirectToRoute('account_address');
    //     }

    //     $form = $this->createForm(AddressType::class, $address);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $address->setUser($this->getUser());

    //         $em->flush();
    //         return $this->redirectToRoute('account_address');
    //     }

    //     return $this->renderForm('account/address_form.html.twig', [
    //         'form' => $form
    //     ]);
    // }

    // #[Route('compte/adresses/supprimer/{id}', name: 'account_address_delete')]
    // public function delete(EntityManagerInterface $em, Address $address = null): Response
    // {
    //     if ($address && $address->getUser() == $this->getUser()) {
    //         $em->remove($address);
    //         $em->flush();
    //     }

    //     return $this->redirectToRoute('account_address');
    // }






    // private $entityManager;
