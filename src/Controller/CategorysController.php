<?php

namespace App\Controller;

use App\Entity\Categorys;
use App\Form\CategorysType;
use App\Repository\CategorysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorys')]
final class CategorysController extends AbstractController
{
    #[Route(name: 'app_categorys_index', methods: ['GET'])]
    public function index(CategorysRepository $categorysRepository): Response
    {
        return $this->render('categorys/index.html.twig', [
            'categorys' => $categorysRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorys_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Categorys();
        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorys/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorys_show', methods: ['GET'])]
    public function show(Categorys $category): Response
    {
        return $this->render('categorys/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorys_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categorys $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorys/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorys_delete', methods: ['POST'])]
    public function delete(Request $request, Categorys $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorys_index', [], Response::HTTP_SEE_OTHER);
    }
}
