<?php

require_once 'vendor/autoload.php';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=world', 'root', '');
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = "SELECT country.code AS code, country.name AS name, country.region AS region, 
            country.population AS population, countrylanguage.language AS language, city.name AS capital FROM country, 
            city, countrylanguage WHERE country.code = city.countryCode AND country.capital = city.id 
            AND country.code = countrylanguage.countryCode AND countrylanguage.isofficial = 'T' 
            ORDER BY population DESC LIMIT 0,20";
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    $page = $twig->load('example6.html');

    echo $page->render(array (
        'data' => $data
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

