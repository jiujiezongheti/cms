<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录CMS后台管理系统</title>
	<link rel="stylesheet" href="../style/css/admin.css">
	<script type="text/javascript" src="../js/admin_login.js"></script>
</head>
<body>
	<form method='post' action='manage.php?action=login' id='adminLogin' name='login'>
		<fieldset>
			<legend>登录CMS后台管理系统</legend>
			<label>账 号： <input type='text' name='admin_user' class='text'></label>
			<label>密 码： <input type='password' name='admin_pass' class='text'></label>
			<label>验证码： <input type='text' name='code' class='text'></label>
			<label class='t'>输入下图的字符，不区分大小写</label>
			<label><img src="../config/code.php" onclick='javascript:this.src="../config/code.php?tm="+Math.random()'></label>
			<input type='submit' value="登录" class='submit' name='send' onclick="return checkLogin();">
		</fieldset>
	</form>
</body>
</html>