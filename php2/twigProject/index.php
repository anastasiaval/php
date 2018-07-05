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
    $sql = 'SELECT products.id AS id, products.name AS name, products.price AS price FROM products LIMIT 4';
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }

    $page = $twig->load('main.html');
    echo $page->render(array('products' => $data));
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

