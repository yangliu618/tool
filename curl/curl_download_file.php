<?php
#$remote = "http://ptts.iflytek.com/test.wav";
$remote = "http://downloads.php.net/pierre/ZendOptimizerPlus-20030214-5.3-nts-vc9-x86.zip";
$local = "/tmp/zendOption.zip";

$cp = curl_init($remote);
$fp = fopen($local,"w");
curl_setopt($cp, CURLOPT_FILE, $fp);
curl_setopt($cp, CURLOPT_HEADER, 0);
curl_exec($cp);
$info = curl_getinfo($cp);
echo "获取". $info["url"] . "耗时". $info["total_time"] . "秒";
curl_close($cp);
