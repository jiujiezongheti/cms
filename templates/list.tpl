<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><!--{webname}--></title>
	<link rel="stylesheet" href="style/css/basic.css">
	<link rel="stylesheet" href="style/css/list.css">
</head>
<body>
	{include file="header.tpl"}
	<div id="list">
		<h2>当前位置&gt;{$nav}</h2>
		<dl>
			<dt><img src="../images/img4.jpg" alt="#"></dt>
			<dd>[<strong>军事动态</strong>] <a href="#">联合梨花因散布涨价信息被罚200万</a></dd>
			<dd>日期：2017年9月18日 19:41:33 点击率：224 好评：0</dd>
			<dd>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增此行为导致日产华产品涨价的信息广强消费者涨价预...</dd>
		</dl>
		<dl>
			<dt><img src="../images/img4.jpg" alt="#"></dt>
			<dd>[<strong>军事动态</strong>] <a href="#">联合梨花因散布涨价信息被罚200万</a></dd>
			<dd>日期：2017年9月18日 19:41:33 点击率：224 好评：0</dd>
			<dd>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增此行为导致日产华产品涨价的信息广强消费者涨价预...</dd>
		</dl>
		<dl>
			<dt><img src="../images/img4.jpg" alt="#"></dt>
			<dd>[<strong>军事动态</strong>] <a href="#">联合梨花因散布涨价信息被罚200万</a></dd>
			<dd>日期：2017年9月18日 19:41:33 点击率：224 好评：0</dd>
			<dd>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增此行为导致日产华产品涨价的信息广强消费者涨价预...</dd>
		</dl>
		<dl>
			<dt><img src="../images/img4.jpg" alt="#"></dt>
			<dd>[<strong>军事动态</strong>] <a href="#">联合梨花因散布涨价信息被罚200万</a></dd>
			<dd>日期：2017年9月18日 19:41:33 点击率：224 好评：0</dd>
			<dd>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增此行为导致日产华产品涨价的信息广强消费者涨价预...</dd>
		</dl>
		<dl>
			<dt><img src="../images/img4.jpg" alt="#"></dt>
			<dd>[<strong>军事动态</strong>] <a href="#">联合梨花因散布涨价信息被罚200万</a></dd>
			<dd>日期：2017年9月18日 19:41:33 点击率：224 好评：0</dd>
			<dd>核心提示：国家发改委发布公告，3月下旬，联合利华（中国）有限公司有关负责人多次接受采访发表日产化产品涨价言论。此行为导致日产华产品涨价的信息广泛传播，增此行为导致日产华产品涨价的信息广强消费者涨价预...</dd>
		</dl>
		<div id="page">分页</div>
	</div>
	<div id="sidebar">
		<div class="nav">
			<h2>子栏目列表</h2>
			{if $childNav}
				{foreach $childNav(key,val)}
					<strong><a href="/list.php?id={@val->id}">{@val->nav_name}</a></strong>
				{/foreach}
			{else}
				<span>该栏目没有子类</span>
			{/if}
		</div>
		<div class="right">
			<h2>本类推荐</h2>
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
		<div class="right">
			<h2>本类热点</h2>
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
		<div class="right">
			<h2>本类图文</h2>
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
	</div>
	{include file="footer.tpl"}
</body>
</html>