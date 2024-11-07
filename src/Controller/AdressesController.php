<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Form\AdressesType;
use App\Repository\AdressesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adresses')]
final class AdressesController extends AbstractController
{
    #[Route(name: 'app_adresses_index', methods: ['GET'])]
    public function index(AdressesRepository $adressesRepository): Response
    {
        return $this->render('adresses/index.html.twig', [
            'adresses' => $adressesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adresses_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adress = new Adresses();
        $form = $this->createForm(AdressesType::class, $adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adress);
            $entityManager->flush();

            return $this->redirectToRoute('app_adresses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adresses/new.html.twig', [
            'adress' => $adress,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adresses_show', methods: ['GET'])]
    public function show(Adresses $adress): Response
    {
        return $this->render('adresses/show.html.twig', [
            'adress' => $adress,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adresses_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adresses $adress, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdressesType::class, $adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adresses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adresses/edit.html.twig', [
            'adress' => $adress,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adresses_delete', methods: ['POST'])]
    public function delete(Request $request, Adresses $adress, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adress->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($adress);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adresses_index', [], Response::HTTP_SEE_OTHER);
    }
}
