<%@ page contentType="text/html;charset=UTF-8" %>
<%@ include file="/common/taglibs.jsp" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>角色管理</title>
	<%@ include file="/common/meta.jsp" %>
	<%@ include file="/common/jqueryvalidate.jsp" %>
	<script type="text/javascript">
		$(document).ready(function() {
			//聚焦第一个输入框
			$("#name").focus();
			//为inputForm注册validate函数
			$("#inputForm").validate();
		});
	</script>
</head>

<body>
<%@ include file="/common/header.jsp" %>
<div id="content">
	<h1><s:if test="id == null">创建</s:if><s:else>修改</s:else>商品分类</h1>
	<form id="inputForm" action="category!save.action" method="post">
		<input type="hidden" name="id" value="${id}"/>
		<table class="noborder">
			<tr>
				<td>分类名:</td>
				<td><input type="text" id="name" name="name" size="40" value="${name}" class="required"/></td>
			</tr>
			<tr>
				<td>上级分类：</td>
				<td><s:select name="category.id" list="allCategoryList" listKey="id" listValue="name" headerKey="0" headerValue="--请选择子类型--"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<security:authorize ifAnyGranted="A_MODIFY_CATEGORY">
						<input class="button" type="submit" value="提交"/>&nbsp;
					</security:authorize>
					<input class="button" type="button" value="返回" onclick="history.back()"/>
				</td>
			</tr>
		</table>
	</form>
</div>
<%@ include file="/common/footer.jsp" %>
</body>
</html>