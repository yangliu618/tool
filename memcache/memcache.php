<?php

$memcache_obj = new Memcache;
$memcache_obj->connect('112.124.33.125', 11211);
$memcache_obj->set('some_key','123456879',0,180);
$memcache_obj->set('second_key','123456879123456879123456879123456879123456879',0,360);
$var = $memcache_obj->get(Array('some_key', 'second_key'));

print_r($var);