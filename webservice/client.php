<?php  
header('Content-Type:text/html;charset=utf-8');
$client = new SoapClient("http://local.github/webservice/server.php?WSDL" , array('trace'=>true));  
var_dump($client,$client->__getTypes());  
try {  
    echo '<xmp>';
    echo "提供的方法\n";
    print_r( $client->__getFunctions ()); 
    echo "相关的数据结构\n";
    print_r($client->__getTypes () ); 
    echo '</xmp>';
    $response = $client->GetPhoneBook('zhang');  
    var_dump($response);  
}catch (SoapFault $sf){  
    var_dump($sf);  
    print ($client->__getLastRequest());  
    print ($client->__getLastResponse());  
}  