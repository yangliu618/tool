<?php

/*
 ob_start();

 for($i=0;$i<70;$i++)
 {
     echo 'printing...<br />';
     ob_flush();
     flush();

     usleep(300000);
 }

*/

ob_end_clean();//修改部分
for ($i=10; $i>0; $i--){
	echo $i.'<br>';
	flush();
	sleep(1);
}


/*
for ($i=10; $i>0; $i--)
{
	echo $i;
	ob_flush();//修改部分
	flush();
	sleep(1);
}
*/