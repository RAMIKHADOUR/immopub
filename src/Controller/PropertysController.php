<?php

namespace App\Controller;

use App\Entity\Propertys;
use App\Form\PropertysType;
use App\Repository\PropertysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/propertys')]
final class PropertysController extends AbstractController
{
    #[Route(name: 'app_propertys_index', methods: ['GET'])]
    public function index(PropertysRepository $propertysRepository): Response
    {
        return $this->render('propertys/index.html.twig', [
            'propertys' => $propertysRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_propertys_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $property = new Propertys();
        $form = $this->createForm(PropertysType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($property);
            $entityManager->flush();

            return $this->redirectToRoute('app_propertys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('propertys/new.html.twig', [
            'property' => $property,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_propertys_show', methods: ['GET'])]
    public function show(Propertys $property): Response
    {
        return $this->render('propertys/show.html.twig', [
            'property' => $property,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_propertys_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Propertys $property, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PropertysType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_propertys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('propertys/edit.html.twig', [
            'property' => $property,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_propertys_delete', methods: ['POST'])]
    public function delete(Request $request, Propertys $property, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$property->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($property);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_propertys_index', [], Response::HTTP_SEE_OTHER);
    }
}
