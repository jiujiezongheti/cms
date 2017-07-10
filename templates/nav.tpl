<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main</title>
	<link rel="stylesheet" href="../style/css/admin.css">
	<script src='../js/admin_manage.js'></script>
</head>
<body id='main'>
	<div class="map">
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id='title'>{$title}</strong>
	</div>

	<ol>
		<li><a href="nav.php?action=show" class="selected">导航列表</a></li>
		<li><a href="nav.php?action=add">新增导航</a></li>
		{if $update}
			<li><a href="#" class="selected">修改导航</a></li>
		{/if}
	</ol>

	{if $show}
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>导航名称</th>
			<th>描叙</th>
			<th>操作</th>
		</tr>
		{foreach $AllLevel(key,value)}
		<tr>
			<td>{@value->id}</td>
			<td>{@value->level_name}</td>
			<td>{@value->level_info}</td>
			<td>
				<a href="nav.php?action=update&id={@value->id}">修改</a> | 
				<a href="nav.php?action=delete&id={@value->id}" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		{/foreach}
	</table>
	<div id='page'>{$page}</div>
	{/if}
	
</body>
</html>