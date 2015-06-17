<?php
/**
 * how to use basic selector to retrieve HTML contents
 * 说明：通过php的simple_html_dom这个类文件，分析html的dom结构并提取想要的内容。
 * 本例把天涯论坛里面的一个股票相关的帖子及回复信息所有与作者相关的回复全部提取出来，并格式化显示。
 * 引用类文件：https://github.com/samacs/simple_html_dom
 * yangliu 2015.6.17
 */
header('Content-type:text/html; charset=utf-8');

include('./simple_html_dom.php');


class getBBSContent {

    const PAGESIZE = 33;
    public $file = './content_niuqi.html';

    private function setMetaCss(){
        $meta = '
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <style>
                .content{display:block; margin:10px; padding:10px;}
                .replyDate{color: blue; font-weight: bold;}
                .page{font-size:30px;margin:20px 0;}
            </style>'.PHP_EOL.PHP_EOL;
        file_put_contents($this->file,$meta);
    }

    public function exec() {
        self::setMetaCss();
        //循环每一页面，格式化想要的内容并保存
        for($i=1;$i<=self::PAGESIZE;$i++){
            echo $i.PHP_EOL;
            self::processContent($i);
        }
    }

    private function processContent($n){
        // get DOM from URL or file
        $html = file_get_html('http://bbs.tianya.cn/post-stocks-1408145-'.$n.'.shtml#ty_vip_look[2015牛气冲天]');

        $str = '';
        foreach($html->find('div[_host="2015%E7%89%9B%E6%B0%94%E5%86%B2%E5%A4%A9"] div.atl-con-bd') as $e) {
            $content = $e->innertext;
            $content = explode('<div class="atl-reply">',$content);
            preg_match('/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}/', $content[1], $matches);
            $str .= '<div class="content"><div class="replyDate">'.$matches[0].'</div>'.$content[0].'</div>'.PHP_EOL;
        }

        $str .=  '<div class="page">Page '.$n.' End !!</div>';

        file_put_contents($this->file,$str,FILE_APPEND);
    }
   
}


$job = new getBBSContent();
$job->exec();

?>