<?php
header('Content-Type:text/html;charset=utf-8');
//$client = new SoapClient("http://local.github/webservice/server.php?WSDL" , array('trace'=>true));  
$client = new SoapClient("http://203.177.208.141:8086/webservice/services/site.wsdl" , array('trace'=>true));
//var_dump($client,$client->__getTypes());  
try {
    


    $response = $client->siteQueryDepositBank($params);
    var_dump($response);  
    die;

    $params = [
        'infProductId' => 'A02',
        'infPwd' => '123456',
        'WSQueryAuth' => [
            'login_name' => 'cfdill115',
            'product_id' => '',
            'pwd' => '9a19d23faadfb5f79bb9861b29704a34',
            'old_pwd' => '',
            'domain_name' => '',
            'site_id'   => '2',
            'ip_address' => '54.169.107.60',
            'login_end_point_type' => '',
        ]
    ];     
    $response = $client->siteAuth($params);
    var_dump($response);  
    die;


    $params = [
        'infProductId' => 'A02',
        'infPwd' => '123456',
        'queryTokenInfo' => [
            'customer_id' => '1000199600',
            'login_name' => 'clqatest129',
            'site_id'   => '2',
            'ip' => '54.169.107.60',
            'token_code' => '',
        ]
    ];                                                                                                                                                                                                  
    $response = $client->createToken($params);
    var_dump($response);  
    die;
 
    $params = [
        'infProductId' => 'A02',
        'infPwd' => '123456',
        'queryTokenInfo' => [
            'customer_id' => '1000199600',
            'login_name' => 'clqatest129',
            'site_id'   => '2',
            'ip' => '54.169.107.60',
            'token_code' => '',
        ]
    ];                                                                                                                                                                                                  
    $response = $client->checkToken($params);
    var_dump($response);  
    die;


    $params = [
        'infProductId' => 'A02',
        'infPwd' => '123456',
        'login_name' => 'clqatest129',
    ];
    $response = $client->siteQueryCredit($params);  
    var_dump($response);  
    die;

}catch (SoapFault $sf){  
    var_dump($sf);  
    print ($client->__getLastRequest());  
    print ($client->__getLastResponse());  
}
