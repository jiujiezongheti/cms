<div id="top">
	<a href="#">文字广告1</a>
	<a href="#">文字广告2</a>
</div>
<div id="header">
	<h1><a href="/">网站logo</a></h1>
	<div class="adver">
		<a href="#">
			<img src="images/adver.jpg" alt="广告图">
		</a>
	</div>
</div>
<div id="nav">
	<ul>
		<li><a href="/">首页</a></li>
		<?php if(@$this->_vars['FrontNav']){;?>
		<?php foreach($this->_vars['FrontNav'] as $key=>$value){?>
		<li><a href="<?php echo $value->id;?>"><?php echo $value->nav_name;?></a></li>
		<?php }?>
		<?php };?>
	</ul>
</div>
<div id="search">
	<form action="">
		<select name="search" id="">
			<option value="" selected='selected'>
				按标题
			</option>
			<option value="">
				按关键字
			</option>
			<option value="">
				全局查询
			</option>
		</select>
		<input type="text" name='keyword' class='text'>
		<input type="submit" name='send' class='submit' value='搜索'>
	</form>
	<strong>TAG标签:</strong>
	<ul>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>
		<li><a href="#">标签</a></li>

	</ul>
</div>