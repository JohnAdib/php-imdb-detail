<?php

$myList = null;
$list_dir = array_filter(glob('list'. '\*'), 'is_dir');
$list_txt = array_filter(glob('list'. '\list*-f.txt'));

if($list_dir)
{
	$myList = generateListOfNames($list_dir);
}
else
{
    echo "dir not exist\n";
    return false;
}
if($list_txt)
{
	$list_txt = readFileString($list_txt);
	$myList = generateListOfNames($list_txt);
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
    echo "List in file";
    myPrint($list_txt);
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



function readFileString($_file)
{
	$myList = [];

	if(is_array($_file) && count($_file) === 1)
	{
		$myFile = $_file[0];
		$handle = fopen($myFile, "r");
		if ($handle)
		{
			while (($line = fgets($handle)) !== false)
			{
				array_push($myList, trim($line));
			}

			fclose($handle);
		}
		else
		{
			echo "error opening the file.";
		}
	}
	else
	{
		echo "multi file is NOT SUPPORTED!";
	}


	return $myList;
}

function generateListOfNames($_list)
{
	$newList = [];
	foreach ($_list as $key => $folder)
	{
		$myName = $folder;
		// remove name of folder form
		$myName = str_replace('list\\', '', $myName);
		$myName = str_replace('.txt', '', $myName);
		// remove first rank and year
		$myName = substr($myName, 10);
		// remove quality of movie
		$myName = strtok($myName, '[');
		// trim to remove extra space from start and end of name
		$myName = trim($myName);
		if($myName)
		{
			$newList[$folder] = $myName;
		}
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