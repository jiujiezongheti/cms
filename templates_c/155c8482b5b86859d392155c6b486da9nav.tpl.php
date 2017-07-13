<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main</title>
	<link rel="stylesheet" href="../style/css/admin.css">
	<script src='../js/admin_nav.js'></script>
</head>
<body id='main'>
	<div class="map">
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id='title'><?php echo @$this->_vars['title'];?></strong>
	</div>

	<ol>
		<li><a href="nav.php?action=show" class="selected">导航列表</a></li>
		<li><a href="nav.php?action=add">新增导航</a></li>
		<?php if(@$this->_vars['update']){;?>
			<li><a href="#" class="selected">修改导航</a></li>
		<?php };?>
	</ol>

	<?php if(@$this->_vars['show']){;?>
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>导航名称</th>
			<th>描叙</th>
			<th>操作</th>
		</tr>
		<?php if(@$this->_vars['AllNav']){;?>
		<?php foreach($this->_vars['AllNav'] as $key=>$value){?>
		<tr>
			<td><?php echo $value->id;?></td>
			<td><?php echo $value->nav_name;?></td>
			<td><?php echo $value->nav_info;?></td>
			<td>
				<a href="nav.php?action=update&id=<?php echo $value->id;?>">修改</a> | 
				<a href="nav.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		<?php }?>
		<?php }else{?>
		<tr>
			<td colspan='4'>没有任何数据</td>
		</tr>
		<?php };?>
	</table>
	<div id='page'><?php echo @$this->_vars['page'];?></div>
	<?php };?>
	
</body>
</html>