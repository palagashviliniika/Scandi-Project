<?php

require_once ('Dbh.class.php');

abstract class Products extends Dbh{

    abstract public function getProduct($type);


    abstract public function setProduct($postData);

}