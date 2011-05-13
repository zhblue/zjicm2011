package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IFix;
import com.mms.pojo.Fix;

public class FixImp extends HibernateDaoSupport implements IFix {
	
	private static final Log log=LogFactory.getLog(FixImp.class);

	public void delete(Fix fix) {
		try {
			this.getHibernateTemplate().delete(fix);
		}catch(RuntimeException re){
			log.error("ɾ������");
			throw re;
		}
	}

	public List<Fix> findAll() {
		try{
			List<Fix> list=this.getHibernateTemplate().find("from Fix");
			return list;
		}catch(RuntimeException re){
			log.error("����ȫ������");
			throw re;
		}
	}

	public Fix findById(Integer id) {
		try{
			Fix fix=(Fix) this.getHibernateTemplate().get(Fix.class, id);
			return fix;
		}catch(RuntimeException re){
			log.error("����ʵ������");
			throw re;
		}
	}

	public void insert(Fix fix) {
		try{
			this.getHibernateTemplate().save(fix);
		}catch(RuntimeException re){
			log.error("��ӳ���");
			throw re;
		}
	}

	public void update(Fix fix) {
		try{
			this.getHibernateTemplate().update(fix);
		}catch(RuntimeException re){
			log.error("���³���");
			throw re;
		}
	}

}
