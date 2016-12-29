<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>添加接口</title>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
function displayParameters() {
	pnum = parseInt($("#pnum:text")[0].value);
	s = '';
	if(pnum > 0) {
		for(i = 1; i <= pnum; i++) {
			s += "<input name=\"parameters[]\" type=\"text\" id=\"parameters[]\" size=\"10\" />";
		}
		$('#displayparam').html(s);
	}
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo site_url("welcome/add"); ?>">
  <table width="400" border="1">
    <caption>
      添加接口
    </caption>
    <tr>
      <td>接口名</td>
      <td><input name="name" type="text" id="name" /></td>
    </tr>
    <tr>
      <td>描述</td>
      <td><textarea name="desc" cols="40" rows="5" id="desc"></textarea></td>
    </tr>
    <tr>
      <td rowspan="2">参数</td>
      <td>参数个数<input name="pnum" type="text" id="pnum" size="10" value="0" />
      	<input type="button" value="ok" onclick="displayParameters();" />
      </td>
    </tr>
    <tr>
      <td id="displayparam">&nbsp;</td>
    </tr>
    <tr>
      <td>sql</td>
      <td><textarea name="sql" cols="40" rows="5" id="sql"></textarea></td>
    </tr>
    <tr>
      <td>缓存时间</td>
      <td><input name="cachetime" type="text" id="cachetime" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" /></td>
    </tr>
  </table>
</form>
</body>
</html>
