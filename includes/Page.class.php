<?php
//分页类
class Page{
	private $total;  //总记录
	public function __construct($total){
		$this->total = $total;
	}
}
?>