<?php

$myList = null;
$list_dir = array_filter(glob('list'. '\*'), 'is_dir');
// $list_txt = array_filter(glob('list'. '\list*.txt'));

if($list_dir)
{
    $myList = $list_dir;
    echo "List of folders";
    myPrint($myList);
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
	echo "hello!";
	return false;
}
if($job === 'fetch')
{

}
else if($job === 'analyse')
{

}
else if($job === 'change')
{

}







function myPrint($_data)
{
    echo "<pre>";
    print_r($_data);
    echo "</pre>";
}

?>