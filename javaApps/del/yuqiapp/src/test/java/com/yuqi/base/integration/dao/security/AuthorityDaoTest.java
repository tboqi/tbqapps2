package com.yuqi.base.integration.dao.security;

import org.junit.Test;
import org.springframework.beans.factory.annotation.Autowired;

import com.yuqi.base.dao.AuthorityDao;
import com.yuqi.base.data.SecurityEntityData;
import com.yuqi.base.entity.Authority;

import org.springside.modules.test.spring.SpringTxTestCase;

/**
 * UserDao的集成测试用例,测试ORM映射及特殊的DAO操作.
 * 
 * @author calvin
 */
public class AuthorityDaoTest extends SpringTxTestCase {
	@Autowired
	private AuthorityDao entityDao;

	@Test
	public void crudEntity() {
		//new entity and save it. 
		Authority entity = SecurityEntityData.getRandomAuthority();
		entityDao.save(entity);
		flush();

		//find entity.
		Authority entityFromDB = entityDao.findUniqueBy("id", entity.getId());
		assertReflectionEquals(entity, entityFromDB);

		//delete entity.
		entityDao.delete(entity.getId());
		flush();
		entity = entityDao.findUniqueBy("id", entity.getId());
		assertNull(entity);
	}
}
