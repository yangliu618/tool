<?php

/**
用于有多个任务，并且任务之间没有依赖可以并行执行的情况，之前安居客的经纪人虚假房源的一些汇总可以使用下面的方法。
*/

$cmds=array(
	'aaaaaa',
	'bbb',
	'ccc',
	'/home/jerry/projects/www/test2.php',
	'/home/jerry/projects/www/test3.php'
);
foreach($cmds as $cmd){
	$pid=pcntl_fork();
	if($pid==-1){ 
	//进程创建失败
		echo '创建子进程失败时返回-1';
		exit(-1);
	}
	else if($pid){ 
	//父进程会得到子进程号，所以这里是父进程执行的逻辑
		//pcntl_wait($status,WNOHANG);
	}
	else{ 
	//子进程处理逻辑
		sleep(1);

		echo $cmd."\n";
		//pcntl_exec('php',[$cmd]);

		exit(0);

	}
}




/*

$i = 0;
$starttime = microtime(TRUE);
$pid_arr = array();
while ($i < intval($argv[1]))
{
    $pid = pcntl_fork();
    if ($pid == -1)
    {
        die('could not fork');
    }
    else
    {
        if ($pid) // parent
        {
            $pid_arr[$i] = $pid;
        }
        else // child
        {
            echo $i."\n";
        }
    }
    $i++;
}

while(count($pid_arr) > 0) {
         //$myId = pcntl_waitpid(-1, $status, WNOHANG);
         $myId = pcntl_waitpid(-1, $status);
         foreach($pid_arr as $key => $pid) {
                 if($myId == $pid) unset($pid_arr[$key]);
         }
         usleep(100);
 }

$elapsed = microtime(TRUE) - $starttime;
print "\n==> total elapsed: " . sprintf("%f secs.\n", $elapsed);


exit;

*/


/*
if (! function_exists('pcntl_fork')) die('PCNTL functions not available on this PHP installation');
//sleep(3);
$num = 0;
 
for ($x = 1; $x < 7; $x++) {
    $pid = pcntl_fork();
    switch ($pid) {
       case -1:
          // @fail
          die('Fork failed');
          break;
 
      case 0:
          // @child: Include() misbehaving code here
          print "FORK: Child #{$x} preparing to nuke...\n";
//          generate_fatal_error(); // Undefined function
          break;
 
      default:
          // @parent
          print "FORK: Parent #{$x}, letting the child run amok...\n";
	      //echo pcntl_waitpid($pid, $status)."\n";
		  $num++;
		  echo 'num:'.$num."\n";
		  if($num>=5){
			echo pcntl_waitpid($pid, $status)."\n";
		  }
          break;
    }
	sleep(1);
 }
 
print "Done! :".getmypid()." )\n\n";
exit;
*/
