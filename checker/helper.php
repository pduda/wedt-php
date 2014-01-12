<?php
require_once('../phpQuery/phpQuery.php');
	class Helper 
	{
		private static $db;
		
		private static $doc;
		
		public static function init()
		{
			self::$db = new PDO('mysql:host=localhost;dbname=wedt;charset=utf8', 'wedt', 'wedt123',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		
		}
		public static function getUrlsFromLink($link,$selector)
		{
			self::$doc = phpQuery::newDocumentFileHTML($link);
			
			$links = pQ($selector);
		
			$urls=array();
		
			foreach($links as $link)
			{
				$temp = pQ($link);
				$urls[]=$temp->attr('href');
			}
			return $urls;
		}
		public static function getUrlsForDomain($domain_id)
		{
			$result = self::$db->query('select * from urls where domain ='.$domain_id);
				
			return $result->fetchAll();
		}
		public static function insertUrl($link,$domain_id,$charset="UTF-8")
		{
			$content = file_get_contents($link);

			if($charset == "ISO-8859-2")
			{
				$content = iconv ( $charset , "UTF-8" , $content );
				$content = str_replace("ISO-8859-2", "UTF-8", $content);
				$content = str_replace("iso-8859-2", "UTF-8", $content);
			}
				
			
			$stmt = self::$db->prepare('insert into urls (`page`,`url`,`domain_id`) VALUES ("'.addslashes($content).'","'.$link.'","'.$domain_id.'");');
			
			$stmt->execute();
			
			//echo $content;
		}
		public static function insertResult($page,$content,$domain_id)
		{
			$stmt = self::$db->prepare('insert into parser_results (`page`,`content`,`author`,`title`,`bibliography`,`tags`,`domain_id`) VALUES ("'.addslashes($page).'","'.addslashes($content['content']).'","'.addslashes($content['author']).'","'.addslashes($content['title']).'","'.addslashes($content['bibliografy']).'","'.addslashes($content['tags']).'","'.$domain_id.'");');
			$stmt->execute();
			
			//echo $stmt->queryString;
		}
		public static function getClassifierResult($id)
		{
			$result = self::$db->query('select * from results_classifier where id ='.$id.' limit 1');
			
			return $result->fetchAll();
		}
		public static function getUrl($id)
		{
			$result = self::$db->query('select * from urls where id ='.$id.' limit 1');
				
			return $result->fetchAll();
		}
		public static function getBlock($id)
		{
			$result = self::$db->query('select * from www_blocks_parser where id ='.$id.' limit 1');
		
			return $result->fetchAll();
		}
		public static function updateClassification($id,$checked,$articleOk,$tagOk="",$titleOk,$authorOk)
		{
			$stmt = self::$db->prepare("update results_classifier SET checked=$checked,isArticleOk=$articleOk,isTagOk=$tagOk,isTitleOk=$titleOk,isAuthorOk=$authorOk where id = $id");
			$stmt->execute();
			//echo "update results_classifier SET checked=$checked,isArticleOk=$articleOk,isTagOk=$tagOk,isTitleOk=$titleOk,isAuthorOk=$authorOk";
			//die();
		}
		public static function getClassificationResults()
		{
			$result = self::$db->query('select id,mode,checked from results_classifier order by mode');
				
			return $result->fetchAll();
		}
		public static function getNextId($id,$getNext)
		{
			if($getNext)
				$result = self::$db->query('select * from results_classifier where id >'.$id.' order by id limit 1');
			else 
				$result = self::$db->query('select * from results_classifier where id <'.$id.' order by id desc limit 1');
					
			/* echo 'select * from results_classifier where id <'.$id.' order by id limit 1';
			die(); */
			return $result->fetchAll();
		}
		public static function addToPage($page,$sel,$value)
		{
			self::$doc = phpQuery::newDocument($page);
			
			self::$doc[$sel]->append($value);
			
			return self::$doc;
		}
	}
