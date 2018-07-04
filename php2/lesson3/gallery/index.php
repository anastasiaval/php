<?php

require_once 'vendor/autoload.php';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
} catch (PDOException $e) {
    echo "Error: Could not connect." . $e->getMessage();
}

try {
    $sql = 'SELECT images.id AS id, images.name AS name, images.alt AS alt FROM images';
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    $page = $twig->load('main.html');
    echo $page->render(array('img' => $data));
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

