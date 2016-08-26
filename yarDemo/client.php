<?php
$client = new Yar_Client("http://dev.local/yar/api.php?showType=apiDoc");
/* the following setopt is optinal */
$client->SetOpt(YAR_OPT_CONNECT_TIMEOUT, 1000);

/* call remote service */
$result = $client->some_method("parameter");
var_dump($result);

echo '<hr>';

$result = $client->say('kkk');
var_dump($result);
