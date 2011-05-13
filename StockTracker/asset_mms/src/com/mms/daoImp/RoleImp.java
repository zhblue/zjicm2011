package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IRole;
import com.mms.pojo.Role;


public class RoleImp extends HibernateDaoSupport implements IRole {
	
	private static final Log log=LogFactory.getLog(RoleImp.class);

	public void delete(Role role) {
		try{
			this.getHibernateTemplate().delete(role);
		}catch(RuntimeException re){
			log.error("删除出错");
			throw re;
		}
	}

	public List<Role> findAll() {
		try{
			List<Role> list=this.getHibernateTemplate().find("from Role");
			return list;
		}catch(RuntimeException re){
			log.error("查询全部出错");
			throw re;
		}
	}

	public Role findById(Integer id) {
		try{
			Role role=(Role) this.getHibernateTemplate().get(Role.class, id);
			return role;
		}catch(RuntimeException re){
			log.error("查询实例出错");
			throw re;
		}
	}

	public void insert(Role role) {
		try{
			this.getHibernateTemplate().save(role);
		}catch(RuntimeException re){
			log.error("插入出错");
			throw re;
		}
	}

	public void update(Role role) {
		try{
			this.getHibernateTemplate().update(role);
		}catch(RuntimeException re){
			log.error("更新出错");
			throw re;
		}
	}

}
