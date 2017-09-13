<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->_config['webname'];?></title>
	<link rel="stylesheet" href="style/css/basic.css">
	<link rel="stylesheet" href="style/css/list.css">
</head>
<body>
	<?php $tpl->create('header.tpl');?>
	<div id="list">
		<h2>当前位置&gt;军事动态</h2>
		<dl>
			<dt>图片</dt>
			<dd>1</dd>
			<dd>2</dd>
			<dd>3</dd>
			<dd>4</dd>
		</dl>
	</div>
	<div id="sidebar">
		sidebar
	</div>
	<?php $tpl->create('footer.tpl');?>
</body>
</html>