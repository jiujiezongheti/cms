<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main</title>
	<link rel="stylesheet" href="../style/css/admin.css">
</head>
<body id='main'>
	<div class="map">
		管理首页&gt;&gt;管理员管理&gt;&gt;<strong>{$title}</strong>
	</div>

	{if $list}
	<table cellspacing="0">
		<tr>
			<th>编号</th>
			<th>用户名</th>
			<th>等级</th>
			<th>登录次数</th>
			<th>最近登录ip</th>
			<th>最近登录时间</th>
			<th>操作</th>
		</tr>
		{foreach $AllManage(key,value)}
		<tr>
			<td>{@value->id}</td>
			<td>{@value->admin_user}</td>
			<td>{@value->level_name}</td>
			<td>{@value->login_count}</td>
			<td>{@value->last_ip}</td>
			<td>{@value->last_time}</td>
			<td>
				<a href="manage.php?action=update&id={@value->id}">修改</a> | 
				<a href="manage.php?action=delete&id={@value->id}" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		{/foreach}
	</table>
	<p class="center">
		[ <a href="manage.php?action=add">新增管理员</a> ]
	</p>
	{/if}
	{if $add}
	<form action="" method='post'>
		<table cellspacing="0" class="left">
			<tr>
				<td>用户名：
					<input type="text" name='admin_user' class='text'>
				</td>
			</tr>
			<tr>
				<td>密码：
					<input type="password" name='admin_pass' class='text'>
				</td>
			</tr>
			<tr>
				<td>等级：<select name="level">
						<option value="1">
							后台游客
						</option>
						<option value="2">
							会员专员
						</option>
						<option value="3">
							评论专员
						</option>
						<option value="4">
							发帖专员
						</option>
						<option value="5">
							普通管理员
						</option>
						<option value="6">
							超级管理员
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit' value="新增管理员">
					[ <a href="manage.php?action=list">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
	{if $update}
	<form action="" method='post'>
		<table cellspacing="0" class="left">
			<tr>
				<td>用户名：
					<input type="text" name='admin_user' class='text'>
				</td>
			</tr>
			<tr>
				<td>密码：
					<input type="password" name='admin_pass' class='text'>
				</td>
			</tr>
			<tr>
				<td>等级：
					<select name="level">
						<option value="1">
							后台游客
						</option>
						<option value="2">
							会员专员
						</option>
						<option value="3">
							评论专员
						</option>
						<option value="4">
							发帖专员
						</option>
						<option value="5">
							超级管理员
						</option>
						<option value="6">
							超级管理员
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit' value="修改管理员">
					[ <a href="manage.php?action=list">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	{/if}
	{if $delete}
	delete
	{/if}
</body>
</html>