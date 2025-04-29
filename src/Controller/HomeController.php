<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController {

    #[Route("/", name:"home")]
    public function home() {

        $cocktails = [
           
            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'images/PiñaColada.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],
        
            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'images/Negroni.jpg',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
        ];

        $lastCocktails = array_slice($cocktails, -2, 2, true);
        
         //$this instance de classe actuelle
         //render en rrapport avec Abstractcontroller 
         return $this->render('home.html.twig', ['cocktails' => $lastCocktails]);
   
   }
   
   }
   
    

