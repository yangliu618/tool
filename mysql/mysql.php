<?php
    mysql_connect("localhost", "root", "123456") or die("Could not connect: " . mysql_error());
    //mysql_connect("127.0.0.1", "ejiuzhen_sh", "PwdEJiuZhen@Sh78&") or die("Could not connect: " . mysql_error());
    mysql_select_db("ejiuzhen");

    $result = mysql_query("SELECT * FROM om_order limit 3 ");

    while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
        print_r($row);
    }

    mysql_free_result($result);