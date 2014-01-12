<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('helper.php');

$result = Helper::getClassifierResult($_GET['id']);
$result = $result[0];

$left_id = Helper::getNextId($_GET['id'],false);
//print_r($left_id);
$left_id = $left_id[0]['id'];

$right_id = Helper::getNextId($_GET['id'],true);
//print_r($left_id);
$right_id = $right_id[0]['id'];
//echo $right_id;
function generateUrl($param)
{
	if($param!="")
		return "http://localhost/wedt/checker?id=".$param;
	else
		return "";
}

//die();
?>
<div id="wedt">

	<div class="left"><a href="<?php echo generateUrl($left_id."");?>">&laquo; previous</a></div>
	<div class="right"><a href="<?php echo generateUrl($right_id."");?>">next &raquo;</a></div>
	<form action="<?php generateUrl("");?>" method="post">
	
		<table>
		<tr>
			<td><input type="checkbox" name="result[isTitleOk]" value="1" <?php if($result['isTitleOk']!=0) echo "checked";?>/> Tytuł ok ?</td>
			<td><input type="checkbox" name="result[isAuthorOk]" value="1" <?php if($result['isAuthorOk']!=0) echo "checked";?>/> Autor ok ?</td>
			<td><input type="checkbox" name="result[isArticleOk]" value="1" <?php if($result['isArticleOk']!=0) echo "checked";?>/> Artykuł ok ?</td>
			<td><input type="checkbox" name="result[isTagOk]" value="1" <?php if($result['isTagOk']!=0) echo "checked";?>/> Tag ok ?</td>	
			<td><input type="submit" name="submit" value="Zapisz"/></td>
		</tr>

		</table>
	
	</form>

</div>
<?php// die();?>