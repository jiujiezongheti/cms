<?php
//模板解析类
class Templates{
	private $_vars = array();
	//保存系统变量
	private $_config = array();
	//创建一个构造方法，检查目录是否存在
	public function __construct(){
		if(!is_dir(TPL_DIR)||!is_dir(TPL_C_DIR)||!is_dir(CACHE)){
			exit('error:模板目录或缓存目录或编译目录不存在');
		}
		$_sxe = simplexml_load_file(ROOT_PATH.'/config/profile.xml');
		$_tagLib = $_sxe->xpath('/root/taglib');
		foreach ($_tagLib as $_tag) {
			$this->_config["$_tag->name"]=$_tag->value;
		}
	}

	//载入方法
	public function display($file){
		$_tplfile = TPL_DIR.$file;//模板文件路径
		if(!file_exists($_tplfile)){
			exit('error:模板文件不存在');
		}
		//生成编译文件
		$_parfile = TPL_C_DIR.md5($file).$file.'.php';
		//缓存文件
		$_cachefile = CACHE.md5($file).$file.'.html';
		//缓存文件存在，直接使用
		if(IS_CACHE){
			if(file_exists($_cachefile)&&file_exists($_parfile)){
				//判断模板文件和编译文件是否修改过,
				if(filemtime($_parfile)>=filemtime($_tplfile)&&filemtime($_cachefile)>=filemtime($_parfile)){
					include $_cachefile;
					return;
				}
				
			}
			
		}
		//当编译文件不存在或者模板文件修改过开始生成编译文件
		if(!file_exists($_parfile)||filemtime($_parfile)<filemtime($_tplfile)){
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($_tplfile);//模板文件
			$parser->compile($_parfile);
		}
		
		//载入编译文件
		include $_parfile;
		if(IS_CACHE){
			//获取缓冲区内容,并创建缓存文件
			file_put_contents($_cachefile, ob_get_contents());
			//清除缓冲区
			ob_end_clean();
			//载入缓冲文件
			include $_cachefile;
		}
	}

	//注入方法assign()
	public function assign($_var,$_value){
		if(isset($_var)&&!empty($_var)){
			$this->_vars[$_var] = $_value;
		}else{
			exit('error:设置模板变量');
		}
	}

	//创建create方法，用于header和footer这种模块模板解析使用，二不生成缓存文件
	public function create($file){
		$_tplfile = TPL_DIR.$file;//模板文件路径
		if(!file_exists($_tplfile)){
			exit('error:模板文件不存在');
		}
		//生成编译文件
		$_parfile = TPL_C_DIR.md5($file).$file.'.php';
		//当编译文件不存在或者模板文件修改过开始生成编译文件
		if(!file_exists($_parfile)||filemtime($_parfile)<filemtime($_tplfile)){
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($_tplfile);//模板文件
			$parser->compile($_parfile);
		}
		//载入编译文件
		include $_parfile;
	}

}
?>