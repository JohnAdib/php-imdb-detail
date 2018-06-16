<?php
include_once 'imdb.class.php';

myPrint($myList);

set_time_limit(count($myList) * 15);

$i = 0;
foreach ($myList as $folder => $sMovie)
{
    $i++;
    $oIMDB = new IMDB($sMovie);
    if ($oIMDB->isReady)
    {
        $myDetail = $oIMDB->getAll();
        $myjson = json_encode($myDetail, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($folder. '/imdb.json', $myjson);
        myPrint("\n...Okay..................... <b>". $sMovie.'</b>');

    }
    else
    {
        myPrint('<p><b>Movie not found</b>: ' . $sMovie . '</p>');
    }
}
?>

