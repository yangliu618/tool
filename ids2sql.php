

<form method="get">
	<fieldset>
		<legend>根据ids生成分库分表的语句</legend>
		<textarea name='ids' cols="50" rows="6"><?php echo isset($_GET["ids"]) ? $_GET["ids"] :''; ?></textarea>
		<br />
		<input type="hidden" name='act' value='ids2sql'>
		<input type='submit' value='submit'>
	</fieldset>
</form>


<?php
header('Content-type:text/html; charset=utf-8');

extract($_GET);


if(isset($act) && $act == 'ids2sql'){
	$arr = explode("\n",$ids);
	//print_r($arr);
	foreach($arr as $row){
		//list($iUin,$sOrderId) = explode("\t",$row);
		$iUin = trim($row);
		$sOrderId = trim($row);
		//echo $iUin."   ".$sOrderId;
		//echo '==========================';
		$db		= substr($iUin,-1);
		$tbl	= substr($iUin,-2,-1);
		//echo $tbl."  ".$db;
		echo "select iUin,sOrderId,sToken from city_user_groupon{$db}.t_token{$tbl} where iUin='{$iUin}' and sOrderId='{$sOrderId}';<br>";
		//exit;
	}
}




