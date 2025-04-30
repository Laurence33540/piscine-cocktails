<?php

namespace App\Entity;

class Cocktail{

    public $id; 

    public $name;

    public $description;

    public $ingredients;
    
    public $image;

    public $createAt;

    public$isPublished;

    public function __construct($name, $description, $ingredients, $image) {

		$this->name = $name;
		$this->description = $description;
		$this->ingredients = $ingredients;
		$this->image = $image;

		$this->createAt = new \DateTime();
		$this->isPublished = true;

		$this->id = 5;
	}

}