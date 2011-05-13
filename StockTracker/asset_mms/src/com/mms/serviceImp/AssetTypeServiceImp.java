package com.mms.serviceImp;

import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;

import com.mms.daoImp.AssetTypeImp;
import com.mms.pojo.AssetType;
import com.mms.service.IAssetTypeService;

public class AssetTypeServiceImp implements IAssetTypeService {

	private Session s;
	private SessionFactory sf;
	private Transaction ts;
	private AssetTypeImp ati;
	
	public AssetTypeImp getAti() {
		return ati;
	}
	public void setAti(AssetTypeImp ati) {
		this.ati = ati;
	}
	public SessionFactory getSf() {
		return sf;
	}
	public void setSf(SessionFactory sf) {
		this.sf = sf;
	}

	public void addType(AssetType assetType) 
	{
		try {
			s = sf.openSession();
			ts = s.beginTransaction();
			s.save(assetType);
			
		} catch (HibernateException e) {
			e.printStackTrace();
		}finally{
			ts.commit();
			s.close();
		}
	}
	public void deleteType(AssetType assettype) {
		
		ati.delete(assettype);
	}
	public AssetType findTypeById(Integer id) {
		
		return ati.findById(id);
	}
	public void updateType(AssetType assettype) {
		ati.sou(assettype);		
	}
	
}
