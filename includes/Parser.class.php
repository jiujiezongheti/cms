<?php
//模板解析类
class Parser{
	private $_tpl;
	//构造方法
	public function __construct($_tplfile){
		if(!$this->_tpl = file_get_contents($_tplfile)){
			exit('error:模板文件读取错误');
		}
	}
	//对外公共方法
	public function compile($_parfile){
		//解析模板内容
		$this->_parvar();
		$this->_parif();
		$this->_par_common();
		$this->_parforeach();
		$this->_parinclude();
		$this->_parconfig();
		//生成编译文件
		if(!file_put_contents($_parfile,$this->_tpl)){
			exit('error:编译文件出错');
		}
	}

	//解析普通变量
	private function _parvar(){
		$patten = '/\{\$([\w]+)\}/';
		if(preg_match($patten, $this->_tpl)){
			$this->_tpl = preg_replace($patten,"<?php echo @\$this->_vars['$1'];?>",$this->_tpl);
		}
	}

	//解析if语句
	private function _parif(){
		$patten_start = '/\{if\s+\$([\w]+)\}/';
		$patten_end = '/\{\/if\}/';
		$patten_else = '/\{else\}/';
		if(preg_match($patten_start, $this->_tpl)){
			if(preg_match($patten_end,$this->_tpl)){
				$this->_tpl = preg_replace($patten_start,"<?php if(@\$this->_vars['$1']){;?>",$this->_tpl);
				$this->_tpl = preg_replace($patten_end,"<?php };?>",$this->_tpl);
				if(preg_match($patten_else,$this->_tpl)){
					$this->_tpl = preg_replace($patten_else,"<?php }else{?>",$this->_tpl);
				}
			}else{
				exit('error:if语句没有闭合');
			}
		}
	}

	//php注释
	private function _par_common(){
		$patten = '/\{#\}(.*)\{#\}/';
		if(preg_match($patten,$this->_tpl)){
			$this->_tpl = preg_replace($patten,"<?php /* $1 */?>",$this->_tpl);
		}
	}

	//解析foreach语句
	private function _parforeach(){
		$patten_start = '/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
		$patten_end = '/\{\/foreach\}/';
		$patten_var = '/\{@([\w]+)\}/';
		if(preg_match($patten_start,$this->_tpl)){
			if(preg_match($patten_end,$this->_tpl)){
				$this->_tpl = preg_replace($patten_start,"<?php foreach(\$this->_vars['$1'] as \$$2=>\$$3){?>",$this->_tpl);
				$this->_tpl = preg_replace($patten_end,"<?php }?>",$this->_tpl);
				if(preg_match($patten_var, $this->_tpl)){
					$this->_tpl = preg_replace($patten_var, "<?php echo \$$1?>", $this->_tpl);
				}
			}else{
				exit('循环标签没有闭合');
			}
		}
	}

	//解析include
	private function _parinclude(){
		$patten = '/\{include\s+file=(\"|\')([\w\.\-\/ ]+)(\"|\')\}/';
		if(preg_match($patten,$this->_tpl,$file)){
			if(!file_exists($file[2])||empty($file)){
				//exit('error:包含文件出错');
			}
			$this->_tpl = preg_replace($patten, "<?php include '/\$2';?>", $this->_tpl);
		}
	}

	//解析系统变量
	private function _parconfig(){
		$patten = '/<!--\{([\w]+)\}-->/';
		if(preg_match($patten,$this->_tpl)){
			$this->_tpl = preg_replace($patten, "<?php echo \$this->_config['$1'];?>", $this->_tpl);
		}
	}
}
?>