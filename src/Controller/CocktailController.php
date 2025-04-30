<?php

namespace App\Controller;

use App\Entity\Cocktail;
use App\Repository\CocktailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CocktailController extends AbstractController{


	#[Route('/cocktails', name: "list-cocktails")]
	public function displayListCocktails(CocktailRepository $cocktailsRepository) {
		$cocktails = $cocktailsRepository->findAll();

		return $this->render('list-cocktails.html.twig', ["cocktails" => $cocktails]);

	}

	#[Route('/list-cocktail/{id}', name: "list-cocktail")]
	public function displaySingleCocktails($id, CocktailRepository $cocktailsRepository) {
		$cocktail = $cocktailsRepository->findOneById($id);

		return $this->render('list-cocktails.html.twig', [
			'cocktail' => $cocktail
		]);
	}
		    #[Route('/create-cocktail', name: "create-cocktail")]
	        public function createCocktail(Request $request) {

				if ($request->isMethod('POST')) {

					$name =$request->request->get('name');
					$ingredients =$request->request->get('ingredients');
					$description =$request->request->get('description');
				    $image =$request->request->get('image');

					$cocktail=new Cocktail($name, $description, $ingredients, $image);
    
//Fake 
//enregistrement du cocktail en BDD ok

$this ->addFlash("sucess", "cocktail : ". $cocktail->name ." enregitré");

}

return  $this->render('create-cocktail.html.twig');

}

}