<?php

require_once ('Dbh.class.php');

abstract class Products extends Dbh{

    public function deleteProducts($id){
        $sql = "DELETE FROM products WHERE id=?";
        $stmt =  $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    abstract public function getProduct($type);

    abstract public function setProduct($postData);

}