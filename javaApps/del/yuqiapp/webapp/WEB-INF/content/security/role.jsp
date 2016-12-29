<%@ page contentType="text/html;charset=UTF-8" %>
<%@ include file="/common/taglibs.jsp" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mini-Web 角色管理</title>
	<%@ include file="/common/meta.jsp" %>
</head>

<body>
<%@ include file="/common/header.jsp" %>
<div id="content">
	<%@ include file="/common/message.jsp" %>
	<%@ include file="/common/userinfo.jsp" %>
	<div>
		<table id="contentTable">
			<tr>
				<th>名称</th>
				<th>授权</th>
				<th>操作</th>
			</tr>

			<s:iterator value="allRoleList">
				<tr>
					<td>${name}</td>
					<td>${authNames}</td>
					<td>&nbsp;
						<security:authorize ifAnyGranted="A_VIEW_ROLE">
							<security:authorize ifNotGranted="A_MODIFY_ROLE">
								<a href="role!input.action?id=${id}">查看</a>&nbsp;
							</security:authorize>
						</security:authorize>

						<security:authorize ifAnyGranted="A_MODIFY_ROLE">
							<a href="role!input.action?id=${id}">修改</a>&nbsp;
							<a href="role!delete.action?id=${id}">删除</a>
						</security:authorize>
					</td>
				</tr>
			</s:iterator>
		</table>
	</div>

	<div>
		<security:authorize ifAnyGranted="A_MODIFY_ROLE">
			<a href="role!input.action">增加新角色</a>
		</security:authorize>
	</div>
</div>
<%@ include file="/common/footer.jsp" %>
</body>
</html>