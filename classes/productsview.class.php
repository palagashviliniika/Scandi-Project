<?php

require_once ("dvdProducts.class.php");
require_once ("bookProducts.class.php");
require_once ("furnitureProducts.class.php");

//crating products view class
class ProductsView{

    //method to get products from db filtered by product type
    public function showTypes($type, $className){
        $modelToCall = new $className();
        $results = $modelToCall->getProduct($type);

        return $results;
    }

    //method to get all products as an assoc array from db
    public function getAll(){

        //calling showTypes method from this class for each type
        $dvds = $this->showTypes('DVD', 'DvdProducts');
        $books = $this->showTypes('Book', 'BookProducts');
        $furnitures = $this->showTypes('Furniture', 'FurnitureProducts');

        //merging arrays
        $results = array_merge($dvds, $books, $furnitures);

        //sorting array
        $sorted = array_column($results, 'id');
        array_multisort($sorted, SORT_ASC, $results);
        return $results;
    }

    //method to show id
    public function showID($product){
        echo htmlspecialchars($product['id']);
    }

    //method to show sku
    public function showSku($product){
        echo htmlspecialchars($product['sku']);
    }

    //method to show name
    public function showName($product){
        echo htmlspecialchars($product['name']);
    }

    //method to show price
    public function showPrice($product){
        echo htmlspecialchars($product['price']).'$';
    }

    //method to show attributes
    public function showAttribute($product){
        switch ($product["productType"]) {
            case 'DVD':
                echo 'Size: '.htmlspecialchars($product['size']).' MB';
                break;
            case 'Book':
                echo 'Weight: '.htmlspecialchars($product['weight']).' KG';
                break;
            case 'Furniture':
                echo 'Dimension: '.htmlspecialchars($product['height']).'x'.htmlspecialchars($product['width']).'x'.htmlspecialchars($product['length']);
                break;
        }
    }
}