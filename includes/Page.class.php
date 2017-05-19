<?php
//分页类
class Page{
	private $total;  //总记录
	private $pagesize; //每页显示条数
	private $limit;  //limit
	private $page;   //当前页码
	private $pagenum;//获取总页码数
	public function __construct($total,$pagesize){
		$this->total = $total;
		$this->pagesize = $pagesize;
		$this->page = $this->setPage();
		$this->limit = 'LIMIT 0,'.$this->pagesize;
	}


	//拦截器
	public function __get($key){
		return $this->$key;
	}


	//分页信息
	public function showpage(){
		return $this->page;
	}


	//获取当前页面
	private function setPage(){
		$num='';
		if(!empty($_GET['page'])){
			if($_GET['page']>0){
				$num=$_GET['page'];
			}else{
				$num=1;
			}
		}else{
			$num=1;
		}
		return $num;
	}
}
?>