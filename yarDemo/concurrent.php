<?php

echo '<pre>';
function callback($retval, $callinfo) {
     var_dump($retval,$callinfo);
	echo '<hr>';
}

function error_callback($type, $error, $callinfo) {
    var_dump($error);
}

//并发调10次call，在some_method中有sleep 1秒，开启12个fpm进程，平均1秒多点完成下面所有请求
$url = 'http://dev.local/yar/api.php?showType=apiDoc';
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback");
//if the callback is not specificed, callback in loop will be used
Yar_Concurrent_Client::call($url, "some_method", array("parameters"));
//this server accept json packager
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback", "error_callback", array(YAR_OPT_PACKAGER => "json"));
//custom timeout 
Yar_Concurrent_Client::call($url, "some_method", array("parameters"), "callback", "error_callback", array(YAR_OPT_TIMEOUT=>1));
//send the requests, the error_callback is optional
Yar_Concurrent_Client::loop("callback", "error_callback");
