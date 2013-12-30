<?php

ob_start();
include 'goto.html';
$aa = ob_get_contents();
ob_clean();
echo $aa;

echo 'bb';


header('X_FORWARDED_FOR:yangilu88998');
echo '<pre>';
print_r($_SERVER);
echo '-----------------------------------';
print_r(get_headers('http://localhost'));

echo 'aaaaaaaaaa';
exit;

$content = 'SHF2907-B';
preg_match('/[a-zA-Z]{3,4}[0-9]{3,4}/',$content,$matches);
print_r($matches);
exit;

echo mktime(0,0,0,12,23,2013);
exit;
echo $curtime =  time() + 86400 * 4;
$curTime = intval(date('YmdH',$curtime));
 if($curTime <= 2013121709 || $curTime >= 2013122300){ //12月16号9点---12月22号24点投票有效
    echo 'aaaaaaaaa';
}else{
    echo 'okkkkkkkk';
}

exit;

$shortopts  = "";
$shortopts .= "f:";  // Required value
$shortopts .= "v::"; // Optional value
$shortopts .= "abc"; // These options do not accept values

$longopts  = array(
    "required:",     // Required value
    "optional::",    // Optional value
    "option",        // No value
    "opt",           // No value
);
$options = getopt($shortopts, $longopts);
print_r($options);

exit;
$options = getopt("f:hp:");
var_dump($options);

exit;

highlight_file(__FILE__);exit;

$bigContent = file_get_contents('/tmp/');
while(true){
    $i = $bigContent . $i;
    $i++;
    if($i%100000 == 0){
        sleep(1);
        echo memory_get_usage();
    }
}

$params = array('type'=>'user_code','value'=>'she2308');
uksort($params, 'strcmp');
$params_str = http_build_query($params);
$params['auth'] = md5($params_str.'ajkzwww');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://home.corp.anjuke.com/api/getUser/");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$ret = json_decode(curl_exec($ch),true);
print_r($ret);
curl_close($ch);

exit;

$content = 'she230 这个app不好用啊SHF890909098Shx784aa提交的内容不合法，什么都不准确。:w';
if(preg_match('/[a-zA-Z]{3,4}[0-9]{3,4}/',$content,$matches)){
    print_r($matches);
}

//preg_match_all('/[a-zA-Z]{3,4}[0-9]{3,4}/',$str,$match);
exit;

$request_uri = $_SERVER['REQUEST_URI'] = '/jinpu/1.0_20130405/offices?macid=53b6a7dfc426442c26276a0b24be5d4d&app=a-ajk&v=4.1.2&qtime=20131122113800&pm=dev222222&o=t03gzm-user+4.1.2+JZO54K+N7108ZMDMF1+release-keys&uuid=3b25a81d-f7a7-47e2-8fa1-c679efe6979e&from=mobile&m=Android-GT-N7108&cv=ver6.0&i=356405057538671&rtype=1&page_size=15&page=1&trade_type=0&cityid=11';
//$request_uri = $_SERVER['REQUEST_URI'] = '/jinpu/1.0/offices?macid=53b6a7dfc426442c26276a0b24be5d4d&app=a-ajk&v=4.1.2&qtime=20131122113800&pm=dev222222&o=t03gzm-user+4.1.2+JZO54K+N7108ZMDMF1+release-keys&uuid=3b25a81d-f7a7-47e2-8fa1-c679efe6979e&from=mobile&m=Android-GT-N7108&cv=ver6.0&i=356405057538671&rtype=1&page_size=15&page=1&trade_type=0&cityid=11';


    if (preg_match('/^(\/.*)?\/\d+\.\d+[\_\.]?([^\/]+)\//', $request_uri, $matches)){
        define('RELEASE_VERSION', $matches[2]);
        $_SERVER['REQUEST_URI'] = preg_match('/^((\/.*)?\/\d+\.\d+)([\_\.]?[^\/]+)(\/.*)/',  $request_uri,$aa);
        print_r($aa);
        $_SERVER['REQUEST_URI'] = preg_replace('/^((\/.*)?\/\d+\.\d+)([\_\.]?[^\/]+)(\/.*)/','\\1\\4', $request_uri);
    }


        echo $_SERVER['REQUEST_URI'];
exit;


if (preg_match('/^(\/.*)?\/\d+\.\d+\.([^\/]+)\//', $_SERVER['REQUEST_URI'], $matches)){
    print_r($matches);
        define('RELEASE_VERSION', substr($matches[2], 1));
//        $_SERVER['REQUEST_URI'] = preg_replace('/(^\/[^\/]+\/\d+\.\d+)(\.[^\/]+)(\/.*)/', '\\1\\3', $request_uri);
        $_SERVER['REQUEST_URI'] = preg_match('/^((\/.*)?\/\d+\.\d+)(\.[^\/]+)(\/.*)/',  $request_uri,$aa);
        print_r($aa);
        echo $_SERVER['REQUEST_URI'];
}

echo 'aa';



exit;
$a = '';
echo '<pre>';

$class = 'Job_RedisListJobController';
$class = 'Anjuke_HaoPanTong_aaaPage';
preg_match('/^(.*?)(?<!_)(Controller|Interceptor|Component|Page)?$/', $class, $matches);
print_r($matches);


//print_r($_SERVER);
exit;

echo '<iframe src="http://shanghai.local.dev.anjuke.com/ask" frameborder="0" scrolling="no" height="900px" width="950"></iframe>';

exit;
error_reporting(E_ERROR | E_WARNING | E_PARSE   );
echo $fjdl;
exit;
$str = null;
if(isset($a)){
    echo 'aa';
}else{
    echo 'dd';
}

aa('a');

function aa($str = null){
    if(isset($str)){
        echo 'bbb';
    }else{
        echo 'ccc';
    }
}
exit;
/*$str = "上海";
if (!preg_match("/^[\x80-\xff_a-zA-Z0-9\w\s]+$/", $str)) {
    echo 'aaa';// self::ENUM_901;
}else{
    echo 'bb';
}
exit;*/

$keyword = '上海';
//$key_words = array();
if (!preg_match("/^[\x4e00-\x9fa5]+$/", $keyword)) {
    echo 'aa';
}else{
    echo 'bb';
}


exit;

$url = 'http://localhost/tool/pdo.php';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type:text/xml; charset=utf-8"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($curl, CURLOPT_TIMEOUT, 5);
$res = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);

echo '<pre>';
print_r($res);
print_r($info);

exit;


$input = file_get_contents("php://input");
echo $input;

echo '------';
  $input = file_get_contents("php://stdin");
echo $input;

exit;

error_reporting(7);
    var_dump(extension_loaded('memcache'));


/* OO API */
$memcache = new Memcache;
$memcache->connect('192.168.197.225', 11211);
echo $memcache->getVersion();

$memcache->set('my-key', 'value1', 0, 300);
$memcache->set('key with space', 'value 2', 0, 300);
print_r($memcache->get(array('my-key', 'key with space'))); // Array ( [my-key] => value1 [key_with_space] => value 2 )
exit;

/* procedural API */
$memcache = memcache_connect('memcache_host', 11211);
echo memcache_get_version($memcache);



$memcache = new Memcache;
var_dump($memcache);
echo 'aa';exit;
$memcache->connect('localhost');
$memcache->set('my-key', 'value1', 0, 300);
$memcache->set('key with space', 'value 2', 0, 300);

print_r($memcache->get(array('my-key', 'key with space'))); // Array ( [my-key] => value1 [key_with_space] => value 2 )
