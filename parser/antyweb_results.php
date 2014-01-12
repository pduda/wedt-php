<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('helper.php');

Helper::init();

$urls = Helper::getUrlsForDomain(2); //2 to id antyweb

//print_r($urls[0]);

//echo $urls[0]['url'];
$i=0;
foreach($urls as $url)
{
	$result = array();
	
	$doc = phpQuery::newDocumentFileHTML($url['url']);
	$page = $doc->htmlOuter();	
	
	$div = pQ('article div.news-content');
	$article_content = pQ($div);
	$article_content['> div']->remove();
	$result['content'] = $article_content->htmlOuter();
		
	$title = pQ('article h1.entry-title');
	$title['> span:first']->remove();
	$result['title'] = $title->htmlOuter();
	
	$author = pQ('article div.entry-meta div.author > a:first');
	$author['> img']->remove();
	$result['author'] = $author->htmlOuter();
	
	$result['bibliografy'] = null;
	
	$tags = pQ('article div.tags');
	$tags['> div']->remove();
	$result['tags'] = $tags->htmlOuter();

	Helper::insertResult($page, $result,2); //2 to id antyweb
	$i++;
	//die($url['url']);
}
//echo $i;

