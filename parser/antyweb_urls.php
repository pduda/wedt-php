<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');

$startPage =2;
$endPage =20;

$base_link = 'http://antyweb.pl/category/felietony/page/';

Helper::init();
$j=0;
for($i = $startPage;$i<$endPage;$i++)
{
	$link = $base_link . $i;
	
	$urls=Helper::getUrlsFromLink($link, 'div.entry-desc h3 a');
	
	foreach ($urls as $url)
	{
		Helper::insertUrl($url, 2);// 2 to id antyweb
$j++;
	}
if($j>=50)
{
	echo "koniec".$j;
	die();
}
}
