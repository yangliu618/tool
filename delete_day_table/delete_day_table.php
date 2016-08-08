<?php   

date_default_timezone_set('Asia/Shanghai');

/*
$fromDate = '20160511';
$fromDate = strtotime($fromDate);
$endDate = strtotime('20160710');

while($fromDate <= $endDate){
        $date = date('Ymd',$fromDate);
        echo "drop table IF EXISTS `c_linkRecord_{$date}`;";
        echo "drop table IF EXISTS `c_userArea_{$date}`;";
        echo "drop table IF EXISTS `c_userSite_{$date}`;";
        echo "drop table IF EXISTS `t_areaPfvTotal_{$date}`;";
        echo "drop table IF EXISTS `t_basic_{$date}`;";
        echo "drop table IF EXISTS `t_dayPfv_{$date}`;";
        echo "drop table IF EXISTS `t_hourPfv_{$date}`;";
        echo "drop table IF EXISTS `t_sitePfv_{$date}`;\n";
        $fromDate += 86400;
}

#var_dump($fromDate,$endDate,time());
*/

//删除指定时间段内的所有表
$fromDate = strtotime('20160728');
$endDate  = strtotime('20160730');

//删除指定第N天的表
$fromDate = $endDate = strtotime("-8 days");


while($fromDate <= $endDate){
        $date = date('Ymd',$fromDate);
        echo "drop table IF EXISTS `y_areaPfvTotal_{$date}`;\n";
        echo "drop table IF EXISTS `y_basic_{$date}`;\n";
        echo "drop table IF EXISTS `y_dayPfv_{$date}`;\n";
        echo "drop table IF EXISTS `y_hourPfv_{$date}`;\n";
        echo "drop table IF EXISTS `y_linkRecord_{$date}`;\n";
        echo "drop table IF EXISTS `y_shopaverage_{$date}`;\n";
        echo "drop table IF EXISTS `y_userYeahwifi_{$date}`;\n";
        echo "drop table IF EXISTS `y_visitRecord_{$date}`;\n";
        $fromDate += 86400;
}

#var_dump($fromDate,$endDate,time());
