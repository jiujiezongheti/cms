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
		管理首页&gt;&gt;等级管理&gt;&gt;<strong id='title'>{$title}</strong>
	</div>

	<ol>
		<li><a href="level.php?action=show" class="selected">等级列表</a></li>
		<li><a href="level.php?action=add">新增等级</a></li>
		{if $update}
			<li><a href="level.php?action=update" class="selected">修改等级</a></li>
		{/if}
	</ol>

	{if $show}
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>等级名称</th>
			<th>等级描叙</th>
			<th>操作</th>
		</tr>
		{foreach $AllLevel(key,value)}
		<tr>
			<td>{@value->id}</td>
			<td>{@value->level_name}</td>
			<td>{@value->level_info}</td>
			<td>
				<a href="level.php?action=update&id={@value->id}">修改</a> | 
				<a href="level.php?action=delete&id={@value->id}" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		{/foreach}
	</table>
	{/if}
	{if $add}
	<form action="" method='post'>
		<table cellspacing="0" class="left">
			<tr>
				<td>等级名称：
					<input type="text" name='level_name' class='text'>
					(*等级名称不得小于2位或者大于20位)
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="level_info" cols="30" rows="10"></textarea>
					(*描叙不得大于200位)
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit level' value="新增等级">
					[ <a href="level.php?action=show">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
	{if $update}
	<form action="" method='post'>
		<input type="hidden" value="{$id}" name='id'>
		<table cellspacing="0" class="left">
			<tr>
				<td>等级名称：
					<input type="text" name='level_name' class='text' value="{$level_name}">
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="level_info" cols="30" rows="10">{$level_info}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit level' value="修改等级">
					[ <a href="level.php?action=show">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
</body>
</html>