<?php

namespace App\Controller;

use CocktailCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController {

	#[Route('/categories', name: "list-categories")]
	public function displayListCategories(CocktailCategoryRepository $cocktailCategoryRepository) {
        $categories = $cocktailCategoryRepository->findAll();
        
		return $this->render('list-categories.html.twig', ['categories' => $categories]);
	}

    #[Route('/categories/{id}', name: 'details-category')]
    public function showDetailsCategory($id, CocktailCategoryRepository $cocktailCategoryRepository)
    {
        $category = $cocktailCategoryRepository->findOneById($id);

        return $this->render('single-category.html.twig', [
            'category' => $category
        ]);
    }

}


// if ($request->isMethod('POST')) {

//     $name = $request->request->get('name');
//     $ingredients = $request->request->get('ingredients');
//     $description = $request->request->get('description');
//     $image = $request->request->get('image');

//     $cocktail = new Cocktail($name, $description, $ingredients, $image);

//     dump($cocktail); die;
// }