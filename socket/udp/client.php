<?php
$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$msg = 'hello';
$len = strlen($msg);
socket_sendto($sock, $msg, $len, 0, '10.96.227.70',888);
socket_close($sock);
?>
