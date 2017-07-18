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
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id='title'>{$title}</strong>
	</div>

	<ol>
		<li><a href="nav.php?action=show" class="selected">导航列表</a></li>
		<li><a href="nav.php?action=add">新增导航</a></li>
		{if $update}
			<li><a href="nav.php?action=update&id={$id}" class="selected">修改导航</a></li>
		{/if}
		{if $addchild}
			<li><a href="nav.php?action=addchild&id={$pid}">新增子导航</a></li>
		{/if}
		{if $showchild}
			<li><a href="nav.php?action=showchild&id={$pid}">子导航列表</a></li>
		{/if}
	</ol>

	{if $show}
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>导航名称</th>
			<th>描叙</th>
			<th>子类</th>
			<th>操作</th>
		</tr>
		{if $AllNav}
		{foreach $AllNav(key,value)}
		<tr>
			<td>{@value->id}</td>
			<td>{@value->nav_name}</td>
			<td>{@value->nav_info}</td>
			<td><a href="nav.php?action=showchild&id={@value->id}">查看</a>|<a href="nav.php?action=addchild&id={@value->id}">增加子类</a></td>
			<td>
				<a href="nav.php?action=update&id={@value->id}">修改</a> | 
				<a href="nav.php?action=delete&id={@value->id}" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		{/foreach}
		{else}
		<tr>
			<td colspan='5'>没有任何数据</td>
		</tr>
		{/if}
	</table>
	<div id='page'>{$page}</div>
	{/if}
	

	{if $showchild}
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>导航名称</th>
			<th>描叙</th>
			<th>操作</th>
		</tr>
		{if $AllChildNav}
		{foreach $AllChildNav(key,value)}
		<tr>
			<td>{@value->id}</td>
			<td>{@value->nav_name}</td>
			<td>{@value->nav_info}</td>
			<td>
				<a href="nav.php?action=update&id={@value->id}">修改</a> | 
				<a href="nav.php?action=delete&id={@value->id}" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		{/foreach}
		{else}
		<tr>
			<td colspan='4'>没有任何数据</td>
		</tr>
		{/if}
		<tr>
			<td colspan='4'>本类隶属于<strong>{$prev_name}</strong>[ <a href="nav.php?action=addchild&id={$pid}">继续增加子类</a> ]
				[ <a href="nav.php?action=show">返回列表</a> ]</td>
		</tr>
	</table>
	<div id='page'>{$page}</div>
	{/if}
	{if $add}
	<form action="" method='post' name="add">
		<input type="hidden" value="0" name='pid'>
		<table cellspacing="0" class="left">
			<tr>
				<td>导航名称：
					<input type="text" name='nav_name' class='text'>
					(*导航名称不得小于2位或者大于20位)
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="nav_info" cols="30" rows="10"></textarea>
					(*描叙不得大于200位)
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit level' value="新增导航" onclick="return checkForm()">
					[ <a href="" onclick="history.back();">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}

	{if $addchild}
	<form action="" method='post' name="add">
		<input type="hidden" value="{$pid}" name='pid'>
		<table cellspacing="0" class="left">
			<tr>
				<td>上级导航：<strong>{$prev_name}</strong></td>
			</tr>
			<tr>
				<td>导航名称：
					<input type="text" name='nav_name' class='text'>
					(*导航名称不得小于2位或者大于20位)
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="nav_info" cols="30" rows="10"></textarea>
					(*描叙不得大于200位)
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit level' value="新增子导航" onclick="return checkForm()">
					[ <a href="" onclick="history.back();">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
	{if $update}
	<form action="" method='post' name="add">
		<input type="hidden" value="{$id}" name='id'>
		<table cellspacing="0" class="left">
			<tr>
				<td>导航名称：
					<input type="text" name='nav_name' class='text' value="{$nav_name}">
					(*导航名称不得小于2位或者大于20位)
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="nav_info" cols="30" rows="10">{$nav_info}</textarea>
					(*描叙不得大于200位)
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit level' value="修改导航" onclick="return checkForm()">
					[ <a href="nav.php?action=show">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
	
</body>
</html>