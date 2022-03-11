<?php

Class validator {
    private $data;
    private $errors = [];
    private static $fields = ['sku', 'name', 'price'];


    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm(){
        foreach (self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateSKU();
        $this->validateName();
        $this->validatePrice();

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

        return $this->errors;

    }

    private function validateSKU(){
        $val = trim($this->data['sku']);

        if(empty($val)){
            $this->addError('sku','Please, submit required data');
        }
//        else {
//            if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
//                $this->addError('email','Email is incorrect');
//            }
//        }
    }

    private function validateName(){
        $val = trim($this->data['name']);

        if (empty($val)){
            $this->addError('name', 'Please, submit required data');
        } else {
            if (!preg_match('/^[a-zA-Z\s\']+$/', $val)){
                $this->addError('name', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validatePrice(){
        $val = trim($this->data['price']);

        if (empty($val)){
            $this->addError('price','Please, submit required data');
        } else {
            if (!preg_match('/[0-9]+\\.[0-9]+/i', $val)){
                $this->addError('price', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validateSize(){
        $val = trim($this->data['size']);

        if (empty($val)) {
            $this->addError('size', 'Please, submit required data');
        } else {
            if (!preg_match('/([+-]?(?=\\.\\d|\\d)(?:\\d+)?(?:\\.?\\d*))(?:[eE]([+-]?\\d+))?/i', $val)){
                $this->addError('size', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validateWeight(){
        $val = trim($this->data['weight']);

        if (empty($val)) {
            $this->addError('weight', 'Please, submit required data');
        } else {
            if (!preg_match('/([+-]?(?=\\.\\d|\\d)(?:\\d+)?(?:\\.?\\d*))(?:[eE]([+-]?\\d+))?/i', $val)){
                $this->addError('weight', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validateHeight(){
        $val = trim($this->data['height']);

        if (empty($val)) {
            $this->addError('height', 'Please, submit required data');
        } else {
            if (!preg_match('/([+-]?(?=\\.\\d|\\d)(?:\\d+)?(?:\\.?\\d*))(?:[eE]([+-]?\\d+))?/i', $val)){
                $this->addError('height', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validateWidth(){
        $val = trim($this->data['width']);

        if (empty($val)) {
            $this->addError('width', 'Please, submit required data');
        } else {
            if (!preg_match('/([+-]?(?=\\.\\d|\\d)(?:\\d+)?(?:\\.?\\d*))(?:[eE]([+-]?\\d+))?/i', $val)){
                $this->addError('width', 'Please, provide the data of indicated type');
            }
        }
    }

    private function validateLength(){
        $val = trim($this->data['length']);

        if (empty($val)) {
            $this->addError('length', 'Please, submit required data');
        } else {
            if (!preg_match('/([+-]?(?=\\.\\d|\\d)(?:\\d+)?(?:\\.?\\d*))(?:[eE]([+-]?\\d+))?/i', $val)){
                $this->addError('length', 'Please, provide the data of indicated type');
            }
        }
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
}

?>