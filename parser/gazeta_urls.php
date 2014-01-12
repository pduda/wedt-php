<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');

$startPage =2;
$endPage =20;

$base_link = 'http://technologie.gazeta.pl/internet/0,104750.html?str=%s_14801311';

Helper::init();
$j=0;
for($i = $startPage;$i<$endPage;$i++)
{
	$link = sprintf($base_link,$i);
	//echo $link.'<br/>';
	$urls=Helper::getUrlsFromLink($link, 'li.entry header h4 a');

	foreach ($urls as $url)
	{
		Helper::insertUrl($url, 3,"ISO-8859-2");// 3 to id gazety
$j++;
	}
if($j>=50)
{
	echo "koniec".$j;
	die();
}
}
