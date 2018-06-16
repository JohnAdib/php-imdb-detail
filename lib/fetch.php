<?php
include_once 'imdb.class.php';

myPrint($myList);
exit();

$aTests = [
    'https://www.imdb.com/title/tt4456850/',
    'https://www.imdb.com/title/tt0033467/',
    'https://www.imdb.com/title/tt0033467/',
    'https://www.imdb.com/title/tt5680152/reference',
    'http://www.imdb.com/title/tt0460681/',
    'tt1124379',
    'tt0187775 ',
    'http://www.imdb.com/title/tt1231587/',
    'https://www.imdb.com/title/tt1392190/',
    'http://www.imdb.com/title/tt0421974/',
    'https://www.imdb.com/title/tt0094618/',
    'http://www.imdb.com/title/tt0448157/',
    'Matrix',
    'Donner Pass',
    'If only',
    'https://www.imdb.com/title/tt1604113/',
    'Wyse Guys',
    'http://www.imdb.com/title/tt2005268/',
    'Wer ist Clark Rockefeller?',
    'North by Northwest',
    'Iron Man 2',
    'One Tree Hill',
    'Formosa Betrayed',
    'New York, I Love You',
    'https://us.imdb.com/Title?0144117',
    'http://www.imdb.com/title/tt1022603/',
    'Fabian Beiner never made a movie. Yet!'
];

set_time_limit(count($aTests) * 15);

$i = 0;
foreach ($aTests as $sMovie) {
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

