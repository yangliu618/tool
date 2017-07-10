<?php  
function GetPhoneBook($name){  
    $pbook="Zhangsan,13888888888,friend,8888@163.com";  
    return $pbook;  
}  
$server = new SoapServer("myphone.wsdl");
$server->addFunction("GetPhoneBook");  
$server->handle();   