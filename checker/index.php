<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('helper.php');

if(isset($_GET['id']))
{
	if(isset($_POST['submit']))
	{
		require_once('handler.php');
	}
	
	Helper::init();
	$temp = Helper::getClassifierResult($_GET['id']);
	//$temp = Helper::getBlock($_GET['id']);
	//$temp = Helper::getUrl($_GET['id']);
	//$page = $temp[0]['content'];
	$page = $temp[0]['page'];
	unset($temp);
	
	ob_start();
	require('style.php');
	$css = ob_get_contents();
	ob_end_clean();
	
	ob_start();
	require('panel.php');
	$html = ob_get_contents();
	ob_end_clean();

	//print_r($html);
	$page = Helper::addToPage($page,'head',$css);
	echo Helper::addToPage($page,'body',$html);
}
else
{
	die("No params");
}
