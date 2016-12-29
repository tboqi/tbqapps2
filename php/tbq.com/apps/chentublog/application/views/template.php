<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="google-site-verification" content="UxemefKtFVMjsevzEn-K56gSRC11pfFrMtbIFgnADWU" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo htmlentities($description); ?>" />
<link href="<?php echo Resource::css('style.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php echo Kohana::$config->load('site.web_title'); ?>" href="<?php echo url::site('rss'); ?>" />
</head>
<body>
	<div id="logo">
		<h1><a href="<?php echo URL::base(); ?>"><?php echo Kohana::$config->load('site.web_title'); ?></a></h1>
		<p><em><?php echo Kohana::$config->load('site.declaration'); ?></em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<li<?php if ($controller == 'article' && $action != 'create'): ?> class="current_page_item"<?php endif ?>><a href="<?php echo URL::base(); ?>" class="first">Home</a></li>
				<?php if (Auth::instance ()->logged_in ()) {?>
				<li<?php if ($controller == 'article' && $action == 'create'): ?> class="current_page_item"<?php endif ?>><a href="<?php echo URL::site('article/create') ?>">添加文章</a></li>
				<li<?php if ($controller == 'article_category' && $action == 'create'): ?> class="current_page_item"<?php endif ?>><a href="<?php echo Url::site('article_category/create'); ?>">添加分类</a></li>
				<li><a href="<?php echo URL::site('user/logout') ?>">退出</a></li>
				<?php } else { ?>
				<li<?php if ($controller == 'user' && $action == 'login'): ?> class="current_page_item"<?php endif ?>><a href="<?php echo URL::site('user/login'); ?>">登录</a></li>
				<?php } ?>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="GO" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
		<div id="content"><?php echo $content; ?></div><!-- end #content -->
		<div id="sidebar">
			<ul><?php /*
				<li>
					<h2>Aliquam tempus</h2>
					<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, volutpat.</p>
				</li>
				*/ ?>
				<?php Block_Article::categories(); ?>
				<?php Block_Article::hot_articles(); ?>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<p>Copyright (c) 2012 Sitename.com. All rights reserved.</p>
	</div>
	<!-- end #footer -->
</body>
<?php foreach($js_array as $js1) { ?>
<script type="text/javascript" src="<?php echo Resource::js($js1); ?>"></script>
<?php } ?>
<?php if (!empty($js)) { ?>
<script type="text/javascript">
<?php echo $js; ?>
</script>
<?php } ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33098987-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  
</script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</html>
