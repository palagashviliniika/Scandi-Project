<?php

//Creating Validator Class
Class validator {
    private $data;
    private $errors = [];

    //Creating Constructor
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    //Main method that validates inserted data and writes errors in an assoc array
    public function validateForm(){

        //Calling method to validate each input field
        $this->validateSKU();
        $this->validateName();
        $this->validatePrice();
        $this->validateType();

        //Calling appropriate validate method according to a product type
        switch ($this->data["productType"]) {
            case 'DVD':
            $this->validateSize();
                break;
            case 'Book':
            $this->validateWeight();
                break;
            case 'Furniture':
            $this->validateHeight();
            $this->validateWidth();
            $this->validateLength();
                break;
        }

        //Method returns error array
        return $this->errors;

    }

    //validates sku
    private function validateSKU(){
        //trims inserted sku from the data
        $val = trim($this->data['sku']);

        //Calls static method to get skus from the db
        $skus = ProductsContr::getSkus();
        foreach ($skus as $sku){
            //checks if inserted sku is unique and adds error
            if ($val==$sku['sku']){
                $this->addError('sku', 'SKU Must be unique');
            }
        }

        //checks whether sku is inserted
        if(empty($val)){
            $this->addError('sku','Please, submit required data');
        }
    }

    //validates name
    private function validateName(){
        //trims inserted name from the data
        $val = trim($this->data['name']);

        //checks whether name field is empty and inserts error
        if (empty($val)){
            $this->addError('name', 'Please, submit required data');
        }
    }


    //validates price
    private function validatePrice(){
        //trims inserted price from the data
        $val = trim($this->data['price']);

        //checks whether price field is empty
        if (empty($val)){
            $this->addError('price','Please, submit required data');
        } else {
            //regex for price to be int or decimal
            if (!preg_match('/^[0-9.]+$/', $val)){
                $this->addError('price', 'Please, provide the proper price');
            }
        }
    }

    //validates product type
    private function validateType(){
        //trims inserted type from the data
        $val = trim($this->data['productType']);

        //checks if product type field is empty
        if ($val == "empty"){
            $this->addError('productType','Please, submit required data');
        }
    }

    //validates size
    private function validateSize(){
        //trims inserted size from the data
        $val = trim($this->data['size']);

        //checks if size data is empty
        if (empty($val)) {
            $this->addError('size', 'Please, submit required data');
        } else {
            //regex for size to be int or decimal
            if (!preg_match('/^[0-9.]+$/', $val)){
                $this->addError('size', 'Please, provide the proper size');
            }
        }
    }

    //validates weight
    private function validateWeight(){
        //trims inserted weight from the data
        $val = trim($this->data['weight']);

        //checks if weight is empty
        if (empty($val)) {
            $this->addError('weight', 'Please, submit required data');
        } else {
            //regex for weight to be int or decimal
            if (!preg_match('/^[0-9.]+$/', $val)){
                $this->addError('weight', 'Please, provide the proper weight');
            }
        }
    }


    //validates height, same functionality as size and weight
    private function validateHeight(){
        $val = trim($this->data['height']);

        if (empty($val)) {
            $this->addError('height', 'Please, submit required data');
        } else {
            if (!preg_match('/^[0-9.]+$/', $val)){
                $this->addError('height', 'Please, provide the proper height');
            }
        }
    }

    //validates width, same functionality as size and weight
    private function validateWidth(){
        $val = trim($this->data['width']);

        if (empty($val)) {
            $this->addError('width', 'Please, submit required data');
        } else {
            if (!preg_match('/^[0-9.]+$/', $val)){
                $this->addError('width', 'Please, provide the proper width');
            }
        }
    }

    //validates length, same functionality as size and weight
    private function validateLength(){
        $val = trim($this->data['length']);

        if (empty($val)) {
            $this->addError('length', 'Please, submit required data');
        } else {
            if (!preg_match('/^[0-9.]+$/i', $val)){
                $this->addError('length', 'Please, provide the proper length');
            }
        }
    }

    //method to write errors in an assoc array
    //we return this error array
    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
}

?>