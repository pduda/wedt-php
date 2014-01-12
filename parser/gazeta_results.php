<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');

Helper::init();

$urls = Helper::getUrlsForDomain(3); //3 to id gazety

//print_r($urls[0]);

//echo $urls[0]['url'];
$i=0;
foreach($urls as $url)
{
	$result = array();
	
	$doc = phpQuery::newDocumentFileHTML($url['url']);
	$page = $doc->htmlOuter();	
	
	$div = pQ('#gazeta_article #article #article_body div');
	$article_content = pQ($div);
	$result['content'] = $article_content->htmlOuter();
		
	$title = pQ('#top_wrap h1');
	$result['title'] = $title->htmlOuter();
	
	$author = pQ('#gazeta_article #gazeta_article_author');
	$result['author'] = $author->htmlOuter();
	
	$result['bibliografy'] = null;
	
	$tags = pQ('#gazeta_article #gazeta_article_tags');
	$result['tags'] = $tags->htmlOuter();

	Helper::insertResult($page, $result,3); //3 to id gazety
	$i++;
	//die($url['url']);
}
echo $i;

