<?php

namespace App\Controller;

use CocktailCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DetailsCategoryController extends AbstractController {

    #[Route("/categorie/{id}", name:"details-categorie")]
    public function categories(CocktailCategoryRepository $cocktailCategoryRepository) {
        $cocktailCategoryRepository = new CocktailCategoryRepository();
        $categories = $cocktailCategoryRepository->findAll();
        
		return $this->render('list-categories.html.twig', ['categories' => $categories]);
	}

    #[Route('/categories/{id}', name: 'details-category')]
    public function showDetailsCategory($id, CocktailCategoryRepository $cocktailCategoryRepository)

    {
        $category = $cocktailCategoryRepository->findOneById($id);

        return $this->render('detailscategory.html.twig', [
            'category' => $category
        ]);
    }

    }