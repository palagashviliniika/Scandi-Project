<?php

require_once ('Dbh.class.php');

abstract class Products extends Dbh{

    public static function deleteProducts($id){
        $sql = "DELETE FROM products WHERE id=?";
        $newDbh = new Dbh();
        $stmt =  $newDbh->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    abstract public function getProduct($type);

    abstract public function setProduct($postData);

}