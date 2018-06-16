<?php

$myList = null;
$list_dir = array_filter(glob('list'. '\*'), 'is_dir');
// $list_txt = array_filter(glob('list'. '\list*.txt'));

if($list_dir)
{
	$myList = generateListOfNames($list_dir);
}
else
{
    echo "dir not exist\n";
    return false;
}

$job = null;
if(isset($_GET['job']))
{
	$job = $_GET['job'];
}

if(!$job)
{
    echo "List of folders";
    myPrint($list_dir);
    myPrint($myList);
	return false;
}
if($job === 'fetch')
{
	include_once 'lib/fetch.php';

}
else if($job === 'analyse')
{

}
else if($job === 'change')
{

}





function generateListOfNames($_list)
{
	$newList = [];
	foreach ($_list as $key => $folder)
	{
		$myName = $folder;
		// remove name of folder form
		$myName = str_replace('list\\', '', $myName);
		// remove first rank and year
		$myName = substr($myName, 10);
		// remove quality of movie
		$myName = strtok($myName, '[');
		// trim to remove extra space from start and end of name
		$myName = trim($myName);
		array_push($newList, $myName);
	}

	return $newList;
}


function myPrint($_data)
{
    echo "<pre>";
    print_r($_data);
    echo "</pre>";
}

?>