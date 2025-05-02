<?php

namespace App\Controller;

use App\Entity\Cocktail;
use App\Repository\CocktailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CocktailController extends AbstractController {

	#[Route('/cocktails', name: "list-cocktails")]
	public function displayListCocktails(CocktailRepository $cocktailsRepository) {
		$cocktails = $cocktailsRepository->findAll();

		return $this->render('list-cocktails.html.twig', ["cocktails" => $cocktails]);
	}

	#[Route('/single-cocktail/{id}', name: "single-cocktail")]
	public function displaySingleCocktails($id, CocktailRepository $cocktailsRepository) {
		$cocktail = $cocktailsRepository->findOneById($id);

		return $this->render('single-cocktail.html.twig', [
			'cocktail' => $cocktail
		]);
	}

	#[Route('/create-cocktail', name: "create-cocktail")]
	public function createCocktail(Request $request) {


		if ($request->isMethod('POST')) {

			$name = $request->request->get('name');
			$ingredients = $request->request->get('ingredients');
			$description = $request->request->get('description');
			$image = $request->request->get('image');

			$cocktail = new Cocktail($name, $description, $ingredients, $image);

			// FAKE
			// enregistrement du cocktail en BDD OK

			$this->addFlash("success", "Cocktail : ". $cocktail->name ." enregistré");
		}
	

		return $this->render('create-cocktail.html.twig');
		
	}
}