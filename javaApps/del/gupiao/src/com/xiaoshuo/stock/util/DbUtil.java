/*
 *  xiaoshuo.com
 *  The biggest website for reading novel.
 *  Copyright (C) 2004 Instart Technologies.
 * 
 *  Created on 2004-1-16 
 */

package com.xiaoshuo.stock.util;

import java.sql.Connection;
import java.sql.DriverManager;

/**
 * ���ݿ������࣬������С˵�������ݿ��������������
 * 
 * @author ����
 * @version 1.0
 */
public class DbUtil {
	private static DbUtil self = null;

	/** ���캯�������õ�ģʽ */
	private DbUtil() {
		
	}
	public synchronized static DbUtil getInstance() {
		if (self == null) {
			self = new DbUtil();
		}
		return self;
	}

	public Connection getXiaoshuoConnection(){
		Connection conn = null;
		try {
			Class.forName("org.gjt.mm.mysql.Driver").newInstance();
			conn = DriverManager.getConnection("jdbc:mysql://"
					+ "202.99.11.153"
					+ "/stock?useUnicode=true&characterEncoding=GBK",
					"shufang", 
					"huantai1609shufang");
		} catch (Exception e) {
			System.out.println("DbUtil.getXiaoshuoConnection() error:" + e.toString()
					);
			e.printStackTrace();
		}
		return conn;
	}

	public Connection getXiaoshuoConnectionRead(){
		Connection conn = null;
		try {
			Class.forName("org.gjt.mm.mysql.Driver").newInstance();
			conn = DriverManager.getConnection("jdbc:mysql://"
					+ "202.99.11.153"
					+ "/stock?useUnicode=true&characterEncoding=GBK",
					"shufang", 
					"huantai1609shufang");
		} catch (Exception e) {
			System.out.println("DbUtil.getXiaoshuoConnectionRead() error:" + e.toString()
					);
			e.printStackTrace();
		}
		return conn;
	}


}
