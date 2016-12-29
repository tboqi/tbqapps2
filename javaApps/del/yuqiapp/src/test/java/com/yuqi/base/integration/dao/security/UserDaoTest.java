package com.yuqi.base.integration.dao.security;

import org.junit.Test;
import org.springframework.beans.factory.annotation.Autowired;

import com.yuqi.base.dao.UserDao;
import com.yuqi.base.data.SecurityEntityData;
import com.yuqi.base.entity.User;

import org.springside.modules.test.spring.SpringTxTestCase;

/**
 * UserDao的集成测试用例,测试ORM映射及特殊的DAO操作.
 * 
 * 默认在每个测试函数后进行回滚.
 * 
 * @author calvin
 */
public class UserDaoTest extends SpringTxTestCase {

	@Autowired
	private UserDao entityDao;

	@Test
	//如果你需要真正插入数据库,将Rollback设为false
	//@Rollback(false) 
	public void crudEntity() {
		//新建并保存用户.
		User entity = SecurityEntityData.getRandomUser();
		entityDao.save(entity);
		//强制执行sql语句
		flush();

		//获取用户
		User entityFromDB = entityDao.findUniqueBy("id", entity.getId());
		assertReflectionEquals(entity, entityFromDB);

		//删除用户
		entityDao.delete(entity.getId());
		flush();
		entity = entityDao.findUniqueBy("id", entity.getId());
		assertNull(entity);
	}

	@Test
	public void crudEntityWithRole() {
		//保存带角色的用户
		User user = SecurityEntityData.getRandomUserWithAdminRole();
		entityDao.save(user);
		flush();

		user = entityDao.findUniqueBy("id", user.getId());
		assertEquals(1, user.getRoleList().size());

		//删除用户的角色
		user.getRoleList().remove(0);
		flush();
		user = entityDao.findUniqueBy("id", user.getId());
		assertEquals(0, user.getRoleList().size());
	}

	//期望抛出ConstraintViolationException的异常.
	@Test(expected = org.hibernate.exception.ConstraintViolationException.class)
	public void savenUserNotUnique() {
		User user = SecurityEntityData.getRandomUser();
		user.setLoginName("admin");
		entityDao.save(user);
		flush();
	}
}