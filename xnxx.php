<?php
//include('simple_html_dom.php');
include('https://raw.githubusercontent.com/mxboxapp/stores/master/simple_html_dom.php');
//$html = file_get_html("https://www.xnxx.tv/best/2010-01");
$html = file_get_html('https://www.xnxx.tv/search/xnxx#');
$arr =array();
foreach($html->find('div.mozaique div.thumb-block ') as $e){
	$img_text ="data-src";
	$result["video"] = 'https://www.xnxx.tv'. $e->find('a',0)->href;
	$result["image"] = trim($e->find('img',0)->$img_text);
	$result["title"] = trim($e->find('p a',0)->title);
	$first = trim($e->find('p.metadata',0)->plaintext);
	$first = str_replace("-","_",$first);
	$second = strpos($first,"%");
    $third = substr($first,$second+2);
	$four = strpos($third,"_");
    $minute = substr($third,0,$four);
    $result["minute"] = $minute;
	$type = substr($third,$four+1);
	$result["type"]=$type;
	
   // $type = substr($first,$third +1);
	//$result["type"] = $type;
//	echo $minute.'<br>';
	
//	$third  = strpos ($first,"-");
	
	
	//$result["minute"] = $minute;
	
 array_push($arr,$result);
}
$mar = array();
$mar["xvideos"]=$arr;
$json = json_encode($mar);
echo $json;
?>
