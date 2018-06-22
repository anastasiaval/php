<?php

class Product {
    public $id;
    public $name;
    public $price;
    public $inStock;

    function __construct($id, $name, $price, $inStock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->inStock = $inStock;
    }

    function discount($percent) {
        if (!is_int($percent) || $percent <= 0 || $percent > 100) {
            return false;
        }
        return $this->price -= $this->price * $percent / 100;
    }

    function setPrice($newPrice) {
        if (!is_numeric($newPrice)) {
            return false;
        }
        return $this->price = $newPrice;
    }

    function newArrival ($quantity){
        if (!is_numeric($quantity) || $quantity <= 0) {
            return false;
        }
        return $this->inStock += $quantity;
    }
}

class Appliances extends Product {
    public $type;
    public $manufacturer;

    function __construct($id, $name, $price, $inStock, $type, $manufacturer) {
        $this->type = $type;
        $this->manufacturer = $manufacturer;
        parent::__construct($id, $name, $price, $inStock);
    }

    function display() {
        return "Наименование: {$this->name}; производитель: {$this->manufacturer}; цена: {$this->price}; 
        наличие на складе: {$this->inStock}";
    }
}

class Fridges extends Appliances {
    public $features;
    public $capacity;
    public $color;

    function __construct($id, $name, $price, $inStock, $type, $manufacturer, $features, $capacity, $color) {
        $this->features = $features;
        $this->capacity = $capacity;
        $this->color = $color;
        parent::__construct($id, $name, $price, $inStock, $type, $manufacturer);
    }

    function addToCart($quantity) {
        if (!is_numeric($quantity) || $quantity > $this->inStock) {
            return false;
        }
        return "{$this->name} в количестве {$quantity} шт. добавлен в корзину.";
    }
}

$newItem = new Fridges(1, 'Холодильник двухкамерный', 25000, 5, 'Холодильники', 'LG', ['No-frost', 'Ice Dispenser'],
    400, 'белый');

echo $newItem->display() . "<br>";
echo $newItem->addToCart(1) . "<br>";
$newItem->discount(10);
echo "Цена со скидкой: $newItem->price <br>";
$newItem->setPrice(21000);
echo "Новая цена: $newItem->price <br>";
$newItem->newArrival(5);
echo "Количество на складе: $newItem->inStock <br>";
