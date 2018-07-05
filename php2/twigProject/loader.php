<?php

require_once 'vendor/autoload.php';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=store', 'root', '');
} catch (PDOException $e) {
    echo "Error: Could not connect." . $e->getMessage();
}

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

try {
    $num = (int) $_GET['num'];

    $sql = 'SELECT products.id AS id, products.name AS name, products.price AS price FROM products LIMIT '.$num.', 2';
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }

    if ($data) {
        foreach ($data as $value) {
            $result .= "
            <div class=\"products__preview\">
            <h5>{$value->name}</h5>
            <p>{$value->price} руб.</p>
            <button>В корзину</button>
            </div>
        ";
        }
    }

    echo $result;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

