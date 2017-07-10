<?php
class Test{
	public $name = '<strong>姓名</strong>';
	public $age = '<em>年龄</em>';
	public function getObject(){
		return $this;
	}
}
$test = new Test();
var_dump(htmlString($test->getObject()));
function htmlString($date){
	if(is_array($date)){
		foreach ($date as $key => $value) {
			$_string[$key] = htmlString($value);
		}
	}elseif(is_object($date)){
		foreach ($date as $key => $value) {
			@$_string->$key = htmlString($value);
		}
	}else{
		$_string = htmlspecialchars($date);
	}
	return $_string;
}
?>