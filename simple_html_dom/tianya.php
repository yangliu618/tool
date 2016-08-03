<?php
// example of how to use basic selector to retrieve HTML contents
header('Content-type:text/html; charset=utf-8');

include('./simple_html_dom.php');

$totalPage = 33;
for($i=1;$i<=$totalPage;$i++){
	echo $i.PHP_EOL;
	processContent($i);
	//exit;
}

function processContent($n){

	// get DOM from URL or file
	$html = file_get_html('http://bbs.tianya.cn/post-stocks-1408145-'.$n.'.shtml#ty_vip_look[2015牛气冲天]');

	$str = '';
	//foreach($html->find('div[js_username="2015%E7%89%9B%E6%B0%94%E5%86%B2%E5%A4%A9"] div.bbs-content') as $e) 
	foreach($html->find('div[_host="2015%E7%89%9B%E6%B0%94%E5%86%B2%E5%A4%A9"] div.atl-con-bd') as $e) {
		$content = $e->innertext;
		$content = explode('<div class="atl-reply">',$content);
		preg_match('/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}/', $content[1], $matches);
		$str .= '<div class="content"><div class="replyDate">'.$matches[0].'</div>'.$content[0].'</div>'.PHP_EOL;
	}

	$str .=  '<div class="page">Page '.$n.' End !!</div>';
	
	file_put_contents('./content_niuqi.html',$str,FILE_APPEND);
	//echo $str;
}
    


?>
