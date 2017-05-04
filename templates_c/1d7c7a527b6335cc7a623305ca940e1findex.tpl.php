<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->_config['webname'];?></title>
	<link rel="stylesheet" href="style/css/index.css">
</head>
<body>
	<div id="top">
		<a href="#">文字广告1</a>
		<a href="#">文字广告2</a>
	</div>
	<div id="header">
		<h1><a href="#">网站logo</a></h1>
		<div class="adver">
			<a href="#">
				<img src="images/adver.jpg" alt="广告图">
			</a>
		</div>
	</div>
	<div id="nav">
		<ul>
			<li><a href="#">首页</a></li>
			<li><a href="#">军事动态</a></li>
			<li><a href="#">八卦娱乐</a></li>
			<li><a href="#">时尚女人</a></li>
			<li><a href="#">科技频道</a></li>
			<li><a href="#">只能手机</a></li>
			<li><a href="#">美容护肤</a></li>
			<li><a href="#">热门骑车</a></li>
			<li><a href="#">房产家居</a></li>
			<li><a href="#">读书教育</a></li>
			<li><a href="#">股票基金</a></li>
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
	<div id="user">
		<h2>会员信息</h2>
		<form action="">
			<label for="">
				用户名: 
				<input type="text" name="uanme" class="text">
			</label>
			<label for="">
				密	码: 
				<input type="password" name="pwd" class="text">
			</label>
			<label for="">
				验证码: 
				<input type="text" name="code" class="text code">
			</label>
			<img src="images/adver.jpg" alt="">
			<p>
				<input type="submit" name='send' class='submit' value='登录'>
				<a href="#">注册会员</a>
				<a href="#">忘记密码</a>
			</p>
		</form>
		<h3>最近登录会员<hr></h3>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
		<dl>
			<dt><img src="images/adver.jpg" alt="头像"></dt>
			<dd>某个用户</dd>
		</dl>
	</div>
	<div id="news">
		<h3><a href="#">最新消息标题</a></h3>
		<p>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增强消费者涨价预...<a href="#">[查看原文]</a></p>
		<p class='link'>
			<a href="#">优酷计划通过再增发再融6亿美元</a> |
			<a href="#">优酷计划通过再增发再融6亿美元</a>
			<a href="#">优酷计划通过再增发再融6亿美元</a> |
			<a href="#">优酷计划通过再增发再融6亿美元</a>
		</p>
		<ul>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>11-06-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
		</ul>
	</div>
	<div id="pic">
		<img src="images/adver.jpg" alt="">
	</div>
	<div id="rec">
		<h2>特别推荐</h2>
		<ul>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
			<li>
				<em>6-20</em>
				<a href="#">
					文章标题，可能很长
				</a>
			</li>
		</ul>
	</div>
	<div id="sidebar-right">
		<div class='adver'>
			<img src="images/adver.jpg" alt="">
		</div>
		<div class="hot">
			<h2>本月热点</h2>
			<ul>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
			</ul>
		</div>
		<div class="comm">
			<h2>本月评论</h2>
			<ul>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
				<li>
					<em>6-20</em>
					<a href="#">
						文章标题，可能很长
					</a>
				</li>
			</ul>
		</div>
		<div class="vote">
			<h2>调查投票</h2>
			<h3>你是怎么知道本站的:</h3>
			<form action="">
				<label for="">
					<input type="radio" name='vote' checked="checked">
					门户收索
				</label>
				<label for="">
					<input type="radio" name='vote'>
					Google或者百度
				</label>
				<label for="">
					<input type="radio" name='vote'>
					别的网站上的链接
				</label>
				<label for="">
					<input type="radio" name='vote'>
					朋友介绍或者电视广告
				</label>
				<p>
					<input type="submit" value="投票" name="send">
					<input type="button" value="查看">
				</p>
			</form>
		</div>
	</div>
	<div id="picnews">picnews</div>
	<div id="newslist">
		<div class="list bottom">
			<h2>军事动态</h2>
		</div>
		<div class="list right bottom">
			<h2>八卦娱乐</h2>
		</div>
		<div class="list">
			<h2>时尚女人</h2>
		</div>
		<div class="list right">
			<h2>科技频道</h2>
		</div>
	</div>
	<div id="link">link</div>
	<div id="footer">footer</div>
</body>
</html>