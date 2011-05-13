package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IBorrow;
import com.mms.pojo.Borrow;

public class BorrowImp extends HibernateDaoSupport implements IBorrow {
	
	private static final Log log=LogFactory.getLog(BorrowImp.class);

	public void delete(Borrow borrow) {
		try {
			this.getHibernateTemplate().delete(borrow);
		}catch(RuntimeException re){
			log.error("删除出错");
			throw re;
		}
	}

	public List<Borrow> findAll() {
		try{
			List<Borrow> list = this.getHibernateTemplate().find("from Borrow");
			return list;
		}catch(RuntimeException re){
			log.error("查询全部出错");
			throw re;
		}
	}

	public Borrow findById(Integer id) {
		try{
			Borrow borrow = (Borrow) this.getHibernateTemplate().get(Borrow.class, id);
			return borrow;
		}catch(RuntimeException re){
			log.error("查询实例出错");
			throw re;
		}
	}

	public void insert(Borrow borrow) {
		try {
			this.getHibernateTemplate().save(borrow);
		}catch(RuntimeException re){
			log.error("添加出错");
			throw re;
		}
	}

	public void update(Borrow borrow) {
		try {
			this.getHibernateTemplate().save(borrow);
		}catch(RuntimeException re){
			log.error("更新出错");
			throw re;
		}
	}

}
