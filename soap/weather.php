<?php
header("content-type:text/html;charset=utf-8");
//这里是该服务的 WSDL 地址
$wsdl="http://www.webxml.com.cn/WebServices/MobileCodeWS.asmx?wsdl";
//实例化 SoapClient即 Soap 客户端
$client=new SoapClient($wsdl);
//使用 getMobileCodeInfo 方法需要传递两次参数需要注意的是这两个参数须放到一个数组中
$onePhone=$client->getMobileCodeInfo(
      array('mobileCode'=>'13973738080',
       'userID'=>''
      )
);
//显示返回信息
print_r($onePhone);

/*
 * response:
 * stdClass Object
 * (
 *     [getMobileCodeInfoResult] => 13973738080湖南 益阳 湖南移动全球通卡
 *     )
 **/
