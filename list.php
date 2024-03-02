<?php

/*

php -S localhost:8000

*/

$file = './data.json';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $jsonData = file_get_contents($file, true);
    header('Content-Type: application/json; charset=utf-8');
    echo $jsonData;
}else{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

        $items = json_decode($_POST['items']);
        $lastUpdated = floor(microtime(true) * 1000);
        error_log(print_r($items, true));

        $jsonData = json_encode(Array
        (
           'items' =>  $items,
            'lastUpdated'=>  $lastUpdated
        ));
        file_put_contents($file, $jsonData);
        error_log(print_r($jsonData, true));

        header('Content-Type: application/json; charset=utf-8');
        echo $jsonData;
    }
}