<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');


$endDate = new DateTime();

$startDate = new DateTime();
$startDate->setDate('2014', '01', '01');

$interval = new DateInterval('P1D'); //interwal zbierania to 1 dzien

$currentDate = $startDate;

$diff=$currentDate->diff($endDate);
$i=0;

/* print_r($diff);

echo $diff->y;
echo $diff->m;
echo $diff->d; */
Helper::init();

while($diff->days!=0 )
{
	$year = $currentDate->format('Y');
	$month = $currentDate->format('m');
	$day = $currentDate->format('d');
	//echo $year.'-'.$month.'-'.$day;
	$link = 'http://techcrunch.com/'.$year.'/'.$month.'/'.$day.'/';
	
	$urls=Helper::getUrlsFromLink($link, 'h2.post-title a');
	
	foreach ($urls as $url)
	{
//echo $url;
		Helper::insertUrl($url, 1);// 1 to id techcrunch
$i++;
	}
	
	$currentDate->add($interval);//dodanie 1 dnia
	$diff=$currentDate->diff($endDate);//ponowne obliczenie roznicy

if($i>=50) die();
}
