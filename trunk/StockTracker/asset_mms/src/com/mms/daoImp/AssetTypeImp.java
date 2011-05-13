package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IAssetType;
import com.mms.pojo.AssetType;


public class AssetTypeImp extends HibernateDaoSupport implements
		IAssetType {

	private static final Log log=LogFactory.getLog(AssetTypeImp.class);
	
	public void delete(AssetType assettype) {
		try{
			this.getHibernateTemplate().delete(assettype);
		}catch(RuntimeException re){
			log.error("ɾ������");
			throw re;
		}
	}

	public List<AssetType> findAll() {
		try{
			List<AssetType> list = this.getHibernateTemplate().find("from AssetType");
			return list;
		}catch(RuntimeException re){
			log.error("��ѯȫ������");
			throw re;
		}
	}

	public AssetType findById(Integer id) {
		try{
			AssetType assettype = (AssetType) this.getHibernateTemplate().get(AssetType.class, id);
			return assettype;
		}catch(RuntimeException re){
			log.error("��ѯʵ������");
			throw re;
		}
		
	}

	public void sou(AssetType assettype) {
		try{
			this.getHibernateTemplate().saveOrUpdate(assettype);
		}catch(RuntimeException re){
			log.error("���³���");
			throw re;
		}
	}

}
