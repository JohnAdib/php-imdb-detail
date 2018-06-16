<?php
include_once 'imdb.class.php';

myPrint($myList);

set_time_limit(count($myList) * 15);

$i = 0;
foreach ($myList as $sMovie) {
    $i++;
    $oIMDB = new IMDB($sMovie);
    if ($oIMDB->isReady) {
        echo '<h1>' . $sMovie . '</h1>';
        foreach ($oIMDB->getAll() as $aItem) {
            echo '<p><b>' . $aItem['name'] . '</b>: ' . $aItem['value'] . '</p>';
        }
    } else {
        echo '<p><b>Movie not found</b>: ' . $sMovie . '</p>';
    }
    echo '<hr>';
}
?>

