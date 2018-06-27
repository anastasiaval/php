<?php

abstract class Goods {
    public $price;
    public $name;
    public $quantity;
    public function __construct($name) {
        $this->name = $name;
    }

    function setPrice($newPrice) {
        if (!is_numeric($newPrice)) {
            return false;
        }
        return $this->price = $newPrice;
    }

    function getQuantity($newQuantity) {
        if (!is_numeric($newQuantity)) {
            return false;
        }
        return $this->quantity = $newQuantity;
    }

    abstract protected function finalPrice();
}

class OnePiece extends Goods {
    public $price;
    public $name;
    public $quantity;

    public function finalPrice() {
        return $price = $this->price * $this->quantity;
    }
}

class Digital  extends OnePiece {
    public $price;
    public $name;
    public $quantity;

    public function finalPrice() {
        return parent::finalPrice() / 2;
    }
}

class ByWeight extends Goods {
    public $price;
    public $name;
    public $weight;

    public function __construct($name, $weight) {
        $this->weight = $weight;
        parent::__construct($name);
    }

    public function finalPrice() {
        return $price = $this->price * $this->weight;
    }
}

$p = new OnePiece('name1');
$p->setPrice(10);
$p->getQuantity(5);
echo $p->finalPrice() . "<br>";

$d = new Digital('name2');
$d->setPrice(10);
$d->getQuantity(5);
echo $d->finalPrice() . "<br>";

$w = new ByWeight('name3', 5);
$w->setPrice(10);
echo $w->finalPrice() . "<br>";

