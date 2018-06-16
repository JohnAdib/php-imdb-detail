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











function myPrint($_data)
{
    echo "<pre>";
    print_r($_data);
    echo "</pre>";
}

?>