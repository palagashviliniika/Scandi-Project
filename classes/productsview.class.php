<?php

require_once ("dvdProducts.class.php");
require_once ("bookProducts.class.php");
require_once ("furnitureProducts.class.php");


class ProductsView{

    public function showTypes($type, $className){
        $modelToCall = new $className();
        $results = $modelToCall->getProduct($type);

        return $results;
    }

    public function showAll(){
        $dvds = $this->showTypes('DVD', 'DvdProducts');
        $books = $this->showTypes('Book', 'BookProducts');
        $furnitures = $this->showTypes('Furniture', 'FurnitureProducts');

        $results = array_merge($dvds, $books, $furnitures);
        return $results;
    }

}