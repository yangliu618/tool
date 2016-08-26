<?php
class API {
    /**
     * the doc info will be generated automatically into service info page.
     * @params 
     * @return
     */
    public function some_method($parameter, $option = "foo") {
		$msg =  __FILE__.':'.__FUNCTION__.print_r(func_get_args(),true).'<br>';
		sleep(1);
		return $msg;
    }

	/**
	* @params
	*/
	public function say($params){
		$msg =  __FILE__.':'.__FUNCTION__.print_r(func_get_args(),true).'<br>';
		return $msg;
	}

	/**
	* can not see this method;
	*/
    protected function client_can_not_see() {
    }
}

if($_GET['showType'] == 'apiDoc'){
	$service = new Yar_Server(new API());
	$service->handle();
}

?>
