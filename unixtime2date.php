

<form method="get">
	<fieldset>
		<legend>Unix时间截转日期</legend>
		<input name='timestamp' value="<?php echo isset($_GET["timestamp"]) ? $_GET["timestamp"] :'1402311199'; ?>">
		<input type="hidden" name='act' value='unixtime2date'>
		<input type='submit' value='submit'>
	</fieldset>
</form>


<form method="get">
	<fieldset>
		<legend>日期转Unix时间截</legend>
		<input name='date' value="<?php echo isset($_GET["date"]) ? $_GET["date"] :'2014-06-09 10:53:19'; ?>" >
		<input type="hidden" name='act' value='date2unixtime'>
		<input type='submit' value='submit'>
	</fieldset>
</form>


<?php
header('Content-type:text/html; charset=utf-8');

extract($_GET);

if($act == 'unixtime2date'){
	if(isset($timestamp)){
		echo $timestamp . ' => '. date('Y-m-d H:i:s',$timestamp);
	}
}elseif($act == 'date2unixtime'){
	if(isset($date)){
		echo $date . ' => '. strtotime($date);
	}
}


