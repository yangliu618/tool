<?php
$remote = "http://localhost/curl/post.php";
$nameArr = array("a","b","c","d","e");

for($i=0;$i<10;$i++) {
	$post_data = array (
		"username" => $nameArr[rand(0,5)].rand(0,1000000),
		"email" => rand(100000,20000000)."@qq.com",
		"password" => "111111111",
		"confirm_password" => "1211111111",
		"extend_field2" => "654333311257",
		"extend_field3" => "0551-5588774",
		"extend_field4" => "0551-5588774",
		"extend_field5" => "13865498754",
		"sel_question" => "friend_birthday",
		"passwd_answer" => "1990-01-28",
		"agreement" => 1,
		"act" => "act_register"
	);

	$ch = curl_init($remote);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$out = curl_exec($ch);
	curl_close($ch);
	print_r($out);
}
