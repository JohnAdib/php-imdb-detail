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
        $myFolder = 'list\\'. str_replace('list\\', '', $folder);
        if (!file_exists($myFolder))
        {
            mkdir($myFolder, 0777, true);
        }
        file_put_contents($myFolder. '/imdb.json', $myjson);
        myPrint("\n...Okay..................... <b>". $sMovie.'</b>');

    }
    else
    {
        myPrint('<p><b>Movie not found</b>: ' . $sMovie . '</p>');
    }
}
?>

