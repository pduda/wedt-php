<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');

Helper::init();

$urls = Helper::getUrlsForDomain(1); //1 to id techcruncha

//print_r($urls[0]);

//echo $urls[0]['url'];
$i=0;
foreach($urls as $url)
{
	$result = array();
	
	$doc = phpQuery::newDocumentFileHTML($url['url']);
	$page = $doc->htmlOuter();	
	
	$div = pQ('div.l-main div.article-entry');
	$article_content = pQ($div);
	$article_content['> div']->remove();
	$result['content'] = $article_content->htmlOuter();
	
	
	$title = pQ('div.l-main header h1');
	$result['title'] = $title->htmlOuter();
	
	
	$author = pQ('div.l-main header div.title-left div.byline a:first');
	$result['author'] = $author->htmlOuter();
	
	$result['bibliografy'] = null;
	
	$result['tags'] = null;

	Helper::insertResult($page, $result,1); // 1 to id techcruncha
	$i++;
	//die();
}
echo $i;

