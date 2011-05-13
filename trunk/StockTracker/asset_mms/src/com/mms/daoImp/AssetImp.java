package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IAsset;
import com.mms.pojo.Asset;
import com.mms.pojo.TUser;


public class AssetImp extends HibernateDaoSupport implements IAsset {

	private static final Log log=LogFactory.getLog(AssetImp.class);
	
	private Session s;
	private Transaction ts;
	private SessionFactory sf;
	
	public SessionFactory getSf() {
		return sf;
	}

	public void setSf(SessionFactory sf) {
		this.sf = sf;
	}

	public void delete(Asset asset) {
		try {
			this.getHibernateTemplate().delete(asset);
		}catch(RuntimeException re){
			log.error("ɾ�����");
			throw re;
		}
	}

	public List<Asset> findAll() {
		try{
			List<Asset> list = this.getHibernateTemplate().find("from Asset");
			return list;
		}catch(RuntimeException re){
			log.error("��ѯȫ������");
			throw re;
		}
	}

	public List<Asset> findAll(Asset asset) {
		String hql="from Asset a where 1=1";
		if(asset!=null){
			if(asset.getAssetName()!=null){
				hql+=" and a.assetName='"+asset.getAssetName()+"'";
			}
		}
		return null;
	}

	public Asset findById(Integer id) {
		try{
			Asset asset = (Asset) this.getHibernateTemplate().get(Asset.class, id);
			return asset;
		}catch(RuntimeException re){
			log.error("��ѯʵ�����");
			throw re;
		}
	}
	
	public void insert(Asset asset) {
		try {
			this.getHibernateTemplate().save(asset);
		}catch(RuntimeException re){
			log.error("��ӳ���");
			throw re;
		}
	}

	public void update(Asset asset) {
		try {
			this.getHibernateTemplate().update(asset);
		}catch(RuntimeException re){
			log.error("���³���");
			throw re;
		}
	}
	public Asset findByName(String name) {
		
		String hql="from Asset a where a.assetName'"+name+"'";
		List l=null;
		Asset asset=null;
		try {			
			s = sf.openSession();
			ts = s.beginTransaction();
			Query q = s.createQuery(hql);
			l=q.list();
		} catch (HibernateException e) {
			
			e.printStackTrace();
		} finally {
			ts.commit();
			s.close();
		}
		for(int i=0;i<l.size();i++)
		{
			asset=(Asset) l.get(i);
		}
		return asset;	
	}
	

	
}
