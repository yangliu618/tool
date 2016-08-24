<?php

/**
PHP使用PCNTL多进程处理一个事务，比如我需要从数据库中获取80w条的数据，再做一系列后续的处理，这个时候用单进程？你可以等到好久好久...... 所以应该使用pcntl函数了。
假设我想要启动20个进程，将1-80w的数据分成20份来做，主进程等待所有子进程都结束了才退出：
*/

$max = 800000;
$workers = 20;
 
$pids = array();
for($i = 0; $i < $workers; $i++){
    $pids[$i] = pcntl_fork();
    switch ($pids[$i]) {
        case -1:
            echo "fork error : {$i} \r\n";
            exit;
        case 0:
            $param = array(
                'lastid' => $max / $workers * $i,
                'maxid' => $max / $workers * ($i+1),
            );
            doBusyJob($param);
            exit;
        default:
            break;
    }
}
 
foreach ($pids as $i => $pid) {
    if($pid) {
        pcntl_waitpid($pid, $status);
    }
}

function doBusyJob($param){
	$t = rand(500000,2999999);
	//usleep($t);
	sleep(1);
	print_r($param);
}



/*
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
*/


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
