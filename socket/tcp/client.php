<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$con=socket_connect($socket,'10.96.227.79',999);
if(!$con){socket_close($socket);exit;}
echo "Link\n";
while($con){
        $hear=socket_read($socket,1024);
        echo $hear;
        $words=fgets(STDIN);
        socket_write($socket,$words);
        if($words=="bye\r\n"){break;}
}
socket_shutdown($socket);
socket_close($sock);
?>
