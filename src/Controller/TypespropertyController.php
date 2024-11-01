<?php

namespace App\Controller;

use App\Entity\Typesproperty;
use App\Form\TypespropertyType;
use App\Repository\TypespropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/typesproperty')]
final class TypespropertyController extends AbstractController
{
    #[Route(name: 'app_typesproperty_index', methods: ['GET'])]
    public function index(TypespropertyRepository $typespropertyRepository): Response
    {
        return $this->render('typesproperty/index.html.twig', [
            'typesproperties' => $typespropertyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_typesproperty_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typesproperty = new Typesproperty();
        $form = $this->createForm(TypespropertyType::class, $typesproperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typesproperty);
            $entityManager->flush();

            return $this->redirectToRoute('app_typesproperty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typesproperty/new.html.twig', [
            'typesproperty' => $typesproperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typesproperty_show', methods: ['GET'])]
    public function show(Typesproperty $typesproperty): Response
    {
        return $this->render('typesproperty/show.html.twig', [
            'typesproperty' => $typesproperty,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_typesproperty_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Typesproperty $typesproperty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypespropertyType::class, $typesproperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_typesproperty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typesproperty/edit.html.twig', [
            'typesproperty' => $typesproperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typesproperty_delete', methods: ['POST'])]
    public function delete(Request $request, Typesproperty $typesproperty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typesproperty->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($typesproperty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_typesproperty_index', [], Response::HTTP_SEE_OTHER);
    }
}
