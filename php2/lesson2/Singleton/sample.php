<?php

include_once 'main.php';

class First extends SingletonPattern {
    use Singleton;
    public $name = 'First';

    public function showMe() {
        echo '<h2>'.$this->name.'</h2><pre>';
        print_r($this);
        echo '</pre>';
    }
}

class Second extends First {
    use Singleton;
    public $name = 'Second';
}


$firstClass1 = First::getInstance();
$firstClass1->showMe();
$firstClass2 = First::getInstance();
$firstClass2->showMe();

$secondClass1 = Second::getInstance();
$secondClass1->showMe();
$secondClass2 = Second::getInstance();
$secondClass2->showMe();

