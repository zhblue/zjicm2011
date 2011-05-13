package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.ITUser;
import com.mms.pojo.TUser;

public class TUserImp extends HibernateDaoSupport implements ITUser {
	
	private Session s;
	private Transaction ts;
	private SessionFactory sf;

	public SessionFactory getSf() {
		return sf;
	}

	public void setSf(SessionFactory sf) {
		this.sf = sf;
	}
	private static final Log log=LogFactory.getLog(TUserImp.class);

	public void delete(TUser user) {
		try{
			this.getHibernateTemplate().delete(user);
		}catch(RuntimeException re){
			log.error("删除出错");
			throw re;
		}
	}

	public List<TUser> findAll() {
		try{
			List<TUser> list=this.getHibernateTemplate().find("from TUser");
			return list;
		}catch(RuntimeException re){
			log.error("查询全部出错");
			throw re;
		}
	}

	public TUser findById(Integer id) {
		try{
			TUser user=(TUser) this.getHibernateTemplate().get(TUser.class, id);
			return user;
		}catch(RuntimeException re){
			log.error("查询实例出错");
			throw re;
		}
	}
	
	public TUser getTUser(TUser user){
		StringBuffer hql = new StringBuffer("from TUser user where user.userName = '");
		hql.append(user.getUserName());
		hql.append("' and user.userPassword = '");
		hql.append(user.getUserPassword());
		hql.append("' and user.role.roleId = ");
		hql.append(user.getRole().getRoleId());
		
		TUser tuser=null;

		Session s=this.getSession();
		Query query=s.createQuery(hql.toString());
		tuser=(TUser) query.uniqueResult();
	
		s.close();

		return tuser;
	}

	public void sou(TUser user) {
		try{
			this.getHibernateTemplate().saveOrUpdate(user);
		}catch(RuntimeException re){
			log.error("更新出错");
			throw re;
		}
	}

	public TUser getUser(String userName) {
		// TODO Auto-generated method stub
		String hql = "from TUser u where u.userName = '" + userName + "'";
		TUser tUser = null;
		try {
			s = sf.openSession();
			ts = s.beginTransaction();
			Query q = s.createQuery(hql);
			tUser = (TUser) q.uniqueResult();
		} catch (HibernateException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			ts.commit();
			s.close();
		}
		return tUser;
	}

}
