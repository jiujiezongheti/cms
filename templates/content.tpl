<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main</title>
	<link rel="stylesheet" href="../style/css/admin.css">
	<script src='../js/admin_content.js'></script>
	<script src="../ckeditor/ckeditor.js"></script>
</head>
<body id='main'>
	<div class="map">
		内容管理&gt;&gt;查看文档列表&gt;&gt;<strong id='title'>{$title}</strong>
	</div>

	<ol>
		<li><a href="content.php?action=show" class="selected">文档列表</a></li>
		<li><a href="content.php?action=add">新增文档</a></li>
		{if $update}
			<li><a href="content.php?action=update" class="selected">修改文档</a></li>
		{/if}
	</ol>
	{if $add}
		<form action="" name="content">
			<table cellspacing="0" class="content">
				<tr>
					<th><strong>发布一条新文档</strong></th>
				</tr>
				<tr>
					<td>文档标题：<input type="text" name="title" class="text"></td>
				</tr>
				<tr>
					<td>栏目：
						<select name="nav" id="">
							<option value="">请选择一个栏目类别</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>定义属性：
						<input type="checkbox" name="top" value="头条">头条
						<input type="checkbox" name="rec" value="推荐">推荐
						<input type="checkbox" name="bold" value="加粗">加粗
						<input type="checkbox" name="skip" value="跳转">跳转
					</td>
				</tr>
				<tr>
					<td>TAG标签：<input type="text" name="tag" class="text"></td>
				</tr>
				<tr>
					<td>关键字：<input type="text" name="keyword" class="text"></td>
				</tr>
				<tr>
					<td>缩略图：
						<input type="text" name="thumbnail" class="text" readonly="readonly">
						<input type="button" value="上传缩略图" onclick="centerWindow('../templates/upload.html','upload','400','100')">
						<img name="pic" style="display: none">
					</td>
				</tr>
				<tr>
					<td>文章来源：<input type="text" name="source" class="text"></td>
				</tr>
				<tr>
					<td>作者：<input type="text" name="author" class="text"></td>
				</tr>
				<tr>
					<td><span class="middle">内容摘要：</span>
						<textarea name="info" id=""></textarea>
					</td>
				</tr>
				<tr class="ckeditor">
					<td>
						<textarea name="content" id="" class="ckeditor">详细内容：这里后期改成编辑器</textarea>
					</td>
				</tr>
				<tr>
					<td>评论选项：<input type="radio" name="commend" value="1" checked="checked">允许评论
						<input type="radio" name="commend" value="0">禁止评论
						浏览次数：<input type="text" name="count" value="100" class="text small">
					</td>
				</tr>
				<tr>
					<td>文档排序：<select name="sort" id="">
							<option value="默认排序">默认排序</option>
							<option>置顶一天</option>
							<option>置顶一周</option>
							<option>置顶一月</option>
							<option>置顶一年</option>
						</select>
						消费金币：<input type="text" name="gold" class="text small">
					</td>
				</tr>
				<tr>
					<td>阅读权限：<select name="limit" id="">
							<option value="默认排序">开放浏览</option>
							<option>初级会员</option>
							<option>中级会员</option>
							<option>高级会员</option>
							<option>vip</option>
						</select>
						标题颜色：<select name="color" id="">
							<option>默认颜色</option>
							<option style="color: red">红色</option>
							<option style="color: blue">蓝色</option>
							<option style="color: orange">橙色</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="发布文档"><input type="reset" value="重置"></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
		</form>
	{/if}
</body>
</html>