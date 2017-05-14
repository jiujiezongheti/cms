<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>top</title>
	<link rel="stylesheet" href="../style/css/admin.css">
	<script type="text/javascript" src='../js/admin_top_nav.js'></script>
</head>
<body id="top">
<h1>LOGO</h1>
<ul>
	<li>
		<a onclick="admin_top_nav(1)" id='nav1' href="../templates/sidebar.html" target='sidebar' class="selected">首页</a>
	</li>
	<li>
		<a onclick="admin_top_nav(2)" id='nav2' href="../templates/sidebarn.html" target='sidebar'>内容</a>
	</li>
	<li>
		<a onclick="admin_top_nav(3)" id='nav3' href="#" target='sidebar'>会员</a>
	</li>
	<li>
		<a onclick="admin_top_nav(4)" id='nav4' href="#" target='sidebar'>系统</a>
	</li>
</ul>
<p>你好，<strong>admin</strong> [ 超级管理员 ] [ 
	<a href="../" target="_blank">去首页</a>
	 ] [ 退出 ]</p>
</body>
</html>