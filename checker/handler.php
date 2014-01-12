<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('helper.php');

$result = $_POST['result'];
//print_r($result);

function getIndex($result,$name)
{
	if(isset($result[$name]))
		return $result[$name];
	else
		return "0";
}
/* echo '<br/>'.getIndex($result,'isAuthorOk').'<br/>';
echo '<br/>'.getIndex($result,'isTitleOk').'<br/>';
echo '<br/>'.getIndex($result,'isTagOk').'<br/>';
echo '<br/>'.getIndex($result,'isArticlerOk').'<br/>'; */

Helper::init();

Helper::updateClassification($_GET['id'], 1, getIndex($result,'isArticleOk'), getIndex($result,'isTagOk'), getIndex($result,'isTitleOk'), getIndex($result,'isAuthorOk'));

//die();