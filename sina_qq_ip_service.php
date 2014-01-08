<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP获取IP地址所在地理位置</title>
</head>
<body>
<center style="margin-top:50px;margin-bottom:50px;">
	你的IP地址为：<b><font color="green"><?php echo GetIP(); ?></font></b><br><br>
  <form method='get' action=''>
  	IP地址：<input type="text" name="ip" value="<?php echo GetIP(); ?>">
	<input type="submit" value="查询">
  </form>
</center>
<?php
/*
 *根据腾讯IP分享计划的地址获取IP所在地，比较精确
 */
function getIPLoc_QQ($queryIP){
    $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP;
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    $result = curl_exec($ch);
    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
    curl_close($ch);
    preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray);
    $loc = $ipArray[1];
    return $loc;
}

/*
 *根据新浪IP查询接口获取IP所在地
 */
function getIPLoc_sina($queryIP){
    $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;
	$ch = curl_init($url);
	//curl_setopt($ch,CURLOPT_ENCODING ,'utf8');
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    $location = curl_exec($ch);
	$location = json_decode($location);
	curl_close($ch);
	
	$loc = "";
	if($location===FALSE) return "";
	if (empty($location->desc)) {
		$loc = $location->province.$location->city.$location->district.$location->isp;
	}else{
		$loc = $location->desc;
	}
	return $loc;
}

function GetIP(){
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$cip = $_SERVER["HTTP_CLIENT_IP"];
	}else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}else if(!empty($_SERVER["REMOTE_ADDR"])){
		$cip = $_SERVER["REMOTE_ADDR"];
	}else{
		$cip = '';
	}
	preg_match("/[\d\.]{7,15}/", $cip, $cips);
	$cip = isset($cips[0]) ? $cips[0] : 'unknown';
	unset($cips);
	return $cip;
}
?>

<div style="margin-left:auto;margin-right:auto;width:600px;">
<?php
if (isset($_GET['ip'])) {
	$ip = $_GET['ip'];
	echo "<hr>";
	
	echo "<fieldset>";
		echo "<legend>腾讯IP分享计划查询结果：</legend>";
		echo "您查询的IP为：&nbsp;&nbsp;<b><font color='red'>".$ip."</font></b><br>";
		echo "该IP所在地为：&nbsp;&nbsp;".getIPLoc_QQ($ip);
	echo "</fieldset>";
	
	echo "<br><br>";
	echo "<fieldset>";
		echo "<legend>新浪IP查询接口查询结果：</legend>";
		echo "您查询的IP为：&nbsp;&nbsp;<b><font color='red'>".$ip."</font></b><br>";
		echo "该IP所在地为：&nbsp;&nbsp;".getIPLoc_sina($ip);
	echo "</fieldset>";
}
?>
</div>
</body>
</html>