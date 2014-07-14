<?php
header('Content-type:text/html; charset=utf-8');

/*
功能：网页授权的方式获取用户基本信息，无需消息交互，只是用户进入到公众号的网页，就可弹出请求用户授权的界面，用户授权后，就可获得其基本信息（此过程甚至不需要用户已经关注公众号。）

微信接口的实现：
http://mp.weixin.qq.com/wiki/index.php?title=%E7%BD%91%E9%A1%B5%E6%8E%88%E6%9D%83%E8%8E%B7%E5%8F%96%E7%94%A8%E6%88%B7%E5%9F%BA%E6%9C%AC%E4%BF%A1%E6%81%AF

用微信打开以下连接，可以生成二维码扫描：
https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfe472af81526dbf1&redirect_uri=http%3A%2F%2Fwww.yinyuanedu.com%2Fwx_auth.php&response_type=code&scope=snsapi_base&state=oauth_yangliu#wechat_redirect

下面代码输出如下：
Array
(
    [code] => 0115946ddd4035f74f71267c93d5f9c7
    [state] => oauth_yangliu
)
Array
(
    [access_token] => OezXcEiiBSKSxW0eoylIeH7zrG3-J1PQZN7WFHnD4SzbvFncPc3y4WgJQaMo0HuX3mQWcLWV4OspuWfzJqqfpjNip8UI907hcrFqLVBuyrulcu2gBljTMB2nnCWTZEJFZbgrxoLSnKR_-2BUEfBH2Q
    [expires_in] => 7200
    [refresh_token] => OezXcEiiBSKSxW0eoylIeH7zrG3-J1PQZN7WFHnD4SzbvFncPc3y4WgJQaMo0HuXM3srTUAiuPyXSwHVPyrIqW-F21ss4oMuw07u1L5hJ-dfCauyytexeO-lB3HRQXHWuIIsMa32iuCenmzj_kn-YQ
    [openid] => oYkmZtzE0_PZjHuN5OO6RoVPQnAg
    [scope] => snsapi_base,snsapi_userinfo
)
Array
(
    [openid] => oYkmZtzE0_PZjHuN5OO6RoVPQnAg
    [nickname] => 杨鎏（jack）
    [sex] => 1
    [language] => zh_CN
    [city] => 
    [province] => 上海
    [country] => 中国
    [headimgurl] => http://wx.qlogo.cn/mmopen/QnwGm9HcwicbAiclF9gYdd7vjx4kbKrkFQHbNpDAjkTmQnOJrpBxK9Er0Fm9dTmqZedkmTA0yAI5NvgmW3icd61bfsyt5KaHxf6/0
    [privilege] => Array
        (
        )

) 
*/

echo '<pre>';
print_r($_GET);

if(isset($_GET['code'])){
	$code = $_GET['code'];
}else{
	die('no code , not allow to access!');
}


// 创建一个新cURL资源
$ch = curl_init();
// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxfe472af81526dbf1&secret=f820bc86f1d264a50cb9c946902b4bff&code=$code&grant_type=authorization_code");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
curl_setopt($ch, CURLOPT_TIMEOUT, 6);
// 抓取URL并把它传递给浏览器
$out = curl_exec($ch);
//关闭cURL资源，并且释放系统资源
curl_close($ch);
$out_base = json_decode($out,true);
print_r($out_base);


$access_token = $out_base['access_token'];
$openid = $out_base['openid'];
// 创建一个新cURL资源
$ch = curl_init();
// 设置URL和相应的选项 
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
curl_setopt($ch, CURLOPT_TIMEOUT, 6);
// 抓取URL并把它传递给浏览器
$out = curl_exec($ch);
//关闭cURL资源，并且释放系统资源
curl_close($ch);
$out_userinfo = json_decode($out,true);
print_r($out_userinfo);
