<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<?php if ( !(Auth::instance ()->logged_in ('ADMIN')) ) { ?>
<script>location.href='<?php echo url::site('user/login'); ?>';</script>
<?php } ?>
</head>

<frameset cols="210,*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo url::site("admin/welcome/menu"); ?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
  <frame src="<?php echo url::site("admin/welcome/main"); ?>" name="mainFrame" id="mainFrame" title="mainFrame" />
</frameset>
<noframes><body>
</body>
</noframes></html>