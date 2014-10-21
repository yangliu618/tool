<?php
header('Content-Type: text/html; charset=utf-8'); 
ini_set('date.timezone','Asia/Shanghai'); 

/**
 * 使用说明：
 * 一开始本文件是非utf-8格式的，生成的url死活调用不成功！还以为是api接口访问有次数限制，后面网上查了下还是编码的问题，于是先加header，再把文件格式也换成utf-8的问题解决！
 * 直接调用百度的接口，http://developer.baidu.com/map/carapi-7.htm
 * 可以设置多个地区，每个地区可以设置多个手机号，为了方便注册一个139的邮箱，发送邮箱时，会手机短信通知，可以接收到天气情况非常方便。
 * author：yangliu
 * date：2014.10.21
 */

$config = array(
        '新野' => array(
                'yangliu' => '13774336866',
                'laojia'  => '15936157574',
                'laojia2' => '18737749345',
        ),
        '上海' => array(
                'yangliu' => '13774336866',
        ),
);

//程序入口
sendSms($config);


function getWeatherApiUrl($location = '上海市'){
        $ak  = 'G9GVNBqm8PhEC0F4MKbf6GvL';
        $sk      = 'eKepL9QyAq3b7WOaDaKim6uA99WTp1uS';
        $url = 'http://api.map.baidu.com/telematics/v3/weather?ak=%s&location=%s&output=%s&sn=%s';//天气查询的完整URL，注意后面的参数按ksort排序的。
        $uri = '/telematics/v3/weather';//这个就是用来计算SN用的URI，根据wiki说的，不带域名和参数
        $output = 'json';//参数output的值 xml  json
        //$location = '上海市';//参数location的值

        //这一步相当重要，注意参数顺序不能错，因为要按ksort排序。
        $querystring_arrays = array(
                'ak' => $ak,
                'location' => $location,
                'output' => $output
        );
        $sn = caculateAKSN($ak, $sk, $uri, $querystring_arrays);//用上面的函数计算一个SN
        $target = sprintf($url, $ak, urlencode($location), $output, $sn);//构造完整的访问URL
        return $target;
}


function curl_get($target){
        try{
                if(empty($target)) 
                        die('WeatherApiUrl 不能为空');

                $ch = curl_init ($target);
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                $res = curl_exec ($ch);
                curl_close ($ch);
                $data = json_decode($res,true);
                return $data;
        } catch(Exception $e){
                print_r($e);
        }
}


function sendSms($config){
        if(count($config)<1)
                die('请先配置：天气预报的城市、要发送到的手机号等信息');

        foreach($config as $city=>$mobiles){
                //echo "Email" | /usr/bin/mutt -s "test" yangliu@group-net.cn
                //$cmd = "echo {$content} | /usr/bin/mutt -s '{$subject}' $mobile.139.com";
                $data = curl_get(getWeatherApiUrl($city));

                if($data['status'] != 'success' || $data['status'] != 0 || count($data['results']) < 1 )
                        continue;

                $data = $data['results'][0];
                $subject = $data['currentCity'].'天气';

                $day =  $data['weather_data'][0];
                $content = $day['date'].','.$day['weather'].','.$day['wind'].','.$day['temperature'].PHP_EOL;
                $day =  $data['weather_data'][1];
                $content .= $day['date'].','.$day['weather'].','.$day['wind'].','.$day['temperature'].PHP_EOL;

                /*
                //详细的天气预报信息 ： 0 穿衣  , 3 感冒
                $content  = $data['index'][0]['tipt'].':'.$data['index'][0]['des']."<br>";
                $content .= $data['index'][3]['tipt'].':'.$data['index'][3]['des']."<br>";
                foreach($data['weather_data'] as $day){
                        $content .= $day['date'].','.$day['weather'].','.$day['wind'].','.$day['temperature']."<br>";
                }
                */

                foreach($mobiles as $name=>$mobile){
                        $cmd = "echo '{$content}' | /usr/bin/mutt -s '{$subject}' {$mobile}@139.com";
                        shell_exec($cmd);

                }

                echo date('Y-m-d H:i:s').' send weather report successfull!'.PHP_EOL;
        }
}

/**
* @brief 计算SN签名算法
* @param string $ak access key
* @param string $sk secret key
* @param string $url url值，例如: /geosearch/nearby 不能带hostname和querstring，也不能带？
* @param array  $querystring_arrays 参数数组，key=>value形式。在计算签名后不能重新排序，也不能添加或者删除数据元素
* @param string $method 只能为'POST'或者'GET'
*/
function caculateAKSN($ak, $sk, $url, $querystring_arrays, $method = 'GET'){
		if ($method === 'POST'){
				ksort($querystring_arrays);
		}
		$querystring = http_build_query($querystring_arrays);
		return md5(urlencode($url.'?'.$querystring.$sk));
}