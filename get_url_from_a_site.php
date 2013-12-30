<?php


## html reg
#$regex = "((https?|ftp)\:\/\/)?"; // SCHEME
#$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
#$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
#$regex .= "(\:[0-9]{2,5})?"; // Port
#$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
#$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
#$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor

$url = isset($_REQUEST['url']) ? $_REQUEST['url'] : 'http://www.baidu.com';
$content = file_get_contents($url);
//echo $content;
preg_match_all("#http:[^\"\'\)\ ]*#", $content,$matches);
echo '<pre>';
print_r($matches);
