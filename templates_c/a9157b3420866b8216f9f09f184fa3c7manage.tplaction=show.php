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
		管理首页&gt;&gt;管理员管理&gt;&gt;<strong id='title'><?php echo @$this->_vars['title'];?></strong>
	</div>

	<ol>
		<li><a href="manage.php?action=show" class="selected">管理员列表</a></li>
		<li><a href="manage.php?action=add">新增管理员</a></li>
		<?php if(@$this->_vars['update']){;?>
			<li><a href="#" class="selected">修改管理员</a></li>
		<?php };?>
	</ol>

	<?php if(@$this->_vars['show']){;?>
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
		<?php if(@$this->_vars['AllManage']){;?>
		<?php foreach($this->_vars['AllManage'] as $key=>$value){?>
		<tr>
			<td><?php echo $value->id;?></td>
			<td><?php echo $value->admin_user;?></td>
			<td><?php echo $value->level_name;?></td>
			<td><?php echo $value->login_count;?></td>
			<td><?php echo $value->last_ip;?></td>
			<td><?php echo $value->last_time;?></td>
			<td>
				<a href="manage.php?action=update&id=<?php echo $value->id;?>">修改</a> | 
				<a href="manage.php?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('确定要删除？')?true:false;">删除</a>
			</td>
		</tr>
		<?php }?>
		<?php }else{?>
		<tr>
			<td colspan="7"></td>
		</tr>
		<?php };?>
	</table>
	<div id='page'><?php echo @$this->_vars['page'];?></div>
	<?php };?>
	<?php if(@$this->_vars['add']){;?>
	<form action="" method='post' name='add'>
		<table cellspacing="0" class="left">
			<tr>
				<td>用户名：
					<input type="text" name='admin_user' class='text'>
					(*不得小于2位，不得大于20位)
				</td>
			</tr>
			<tr>
				<td>密码：
					<input type="password" name='admin_pass' class='text'>
					(*不得小于6位)
				</td>
				
			</tr>
			<tr>
				<td>密码确认：
					<input type="password" name='admin_passnote' class='text'>
					(*于密码一致)
				</td>
				
			</tr>
			<tr>
				<td>等级：<select name="level">
						<?php foreach($this->_vars['AllLevel'] as $key=>$value){?>
							<option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit' value="新增管理员" onclick="return checkAddForm();">
					[ <a href="manage.php?action=show">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	<?php };?>
	<?php if(@$this->_vars['update']){;?>
	<form action="" method='post' name="update">
		<input type="hidden" value="<?php echo @$this->_vars['id'];?>" name='id'>
		<input type="hidden" value="<?php echo @$this->_vars['level'];?>" id='level'>
		<input type="hidden" value="<?php echo @$this->_vars['admin_pass'];?>" name='pass'>
		<table cellspacing="0" class="left">
			<tr>
				<td>用户名：
					<input type="text" name='admin_user' class='text' value="<?php echo @$this->_vars['admin_user'];?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td>密码：
					<input type="password" name='admin_pass' class='text'>
					(*留空则不修改密码)
				</td>
			</tr>
			<tr>
				<td>等级：
					<select name="level">
						<?php foreach($this->_vars['AllLevel'] as $key=>$value){?>
							<option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name='submit' class='submit' value="修改管理员" onclick="return checkUpdateForm()">
					[ <a href="manage.php?action=show">返回列表</a> ]
				</td>
			</tr>
		</table>
	</form>
	<?php };?>
</body>
</html>