<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class categoryCocktailsController extends AbstractController {

        #[Route("/categories", name:"list-categories")]
        public function categories() : Response{
        
            $categories = [
                1 => [
                    "id" => 1,
                    "nom" => "cocktail",
                    "description" => "cocktails classiques avec alcool"
                ],
                2 => [
                    "id" => 2,
                    "nom" => "mocktail",
                    "description" => "cocktails sans alcool"
                ],
                3 => [
                    "id" => 3,
                    "nom" => "shooter",
                    "description" => "moins de 25 cl"
                ],
                4 => [
                    "id" => 4,
                    "nom" => "cocktails soft",
                    "description" => "cocktails sans alcool fort"
                ],
            ];


            return $this->render('categoryCocktails.html.twig', [
                'categories' => $categories ]);
            
        }   
}  