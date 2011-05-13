package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IPopedom;
import com.mms.pojo.Popedom;

public class PopedomImp extends HibernateDaoSupport implements IPopedom {
	
	private static final Log log=LogFactory.getLog(PopedomImp.class);

	public void delete(Popedom popedom) {
		try{
			this.getHibernateTemplate().delete(popedom);
		}catch(RuntimeException re){
			log.error("ɾ������");
			throw re;
		}
	}

	public List<Popedom> findAll() {
		try{
			List<Popedom> list=this.getHibernateTemplate().find("from Popedom");
			return list;
		}catch(RuntimeException re){
			log.error("��ѯȫ������");
			throw re;
		}
	}

	public Popedom findById(Integer id) {
		try{
			Popedom popedom=(Popedom) this.getHibernateTemplate().get(Popedom.class, id);
			return popedom;
		}catch(RuntimeException re){
			log.error("��ѯʵ������");
			throw re;
		}
	}

	public void insert(Popedom popedom) {
		try{
			this.getHibernateTemplate().save(popedom);
		}catch(RuntimeException re){
			log.error("�������");
			throw re;
		}
	}

	public void update(Popedom popedom) {
		try{
			this.getHibernateTemplate().update(popedom);
		}catch(RuntimeException re){
			log.error("���³���");
			throw re;
		}
	}

}
