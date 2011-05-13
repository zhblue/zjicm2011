package com.mms.daoImp;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.Set;

import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;

import com.mms.dao.IAssetType;
import com.mms.dao.ICheck;
import com.mms.pojo.Asset;
import com.mms.pojo.AssetType;



public class CheckImp implements ICheck {
	private SessionFactory sf;
	private Session s;
	private Transaction ts;
	private IAssetType iat;
	
	
	public SessionFactory getSf() {
		return sf;
	}

	public void setSf(SessionFactory sf) {
		this.sf = sf;
	}

	public IAssetType getIat() {
		return iat;
	}

	public void setIat(IAssetType iat) {
		this.iat = iat;
	}


	public List serchByName(String assetName) {
		
		String hql="from Asset a where a.assetName='"+assetName+"'";
		List l=null;
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
		return l;
	}

	public List serchByNumber(String assetNumber) {
		String hql="from Asset a where a.assetNumber='"+assetNumber+"'";
		List l=null;
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
		return l;
	}

	public List<Asset> serchByType(Integer typeid) 
	{
		
		List<Asset> al=new ArrayList<Asset>();
		AssetType at=iat.findById(typeid);
		Asset a=new Asset();
		Set<Asset> asset=at.getAssets();
		Iterator<Asset> it=asset.iterator();
		while(it.hasNext())
		{
			a=(Asset) it.next();
			al.add(a);
		}
		return al;
	}

	public List<Asset> serchByUseType(String assetUseType) {
		String hql="from Asset a where a.assetUseType='"+assetUseType+"'";
		List l=null;
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
		return l;
	}
}
