package com.mms.serviceImp;

import java.util.ArrayList;
import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Restrictions;

import com.mms.pojo.Asset;
import com.mms.service.ICheckService;

public class CheckServiceImp implements ICheckService {

	private SessionFactory sf;
	public SessionFactory getSf() {
		return sf;
	}
	public void setSf(SessionFactory sf) {
		this.sf = sf;
	}
	public List<Asset> serchAll(Asset filter) {
		DetachedCriteria dcri=DetachedCriteria.forClass(Asset.class);
		Criteria cri = dcri.getExecutableCriteria(sf.openSession());
		if(filter!=null){
			if(filter.getAssetName()!=null&&!filter.getAssetName().equals("")){
				cri.add(Restrictions.like("assetName", filter.getAssetName(),MatchMode.ANYWHERE));
			}
			if(filter.getAssetType()!=null&&!filter.getAssetType().equals("0")){
				cri.add(Restrictions.like("assetType", filter.getAssetType()));
			}
			if(filter.getAssetNumber()!=null&&!filter.getAssetNumber().equals("")){
				cri.add(Restrictions.like("assetNumber", filter.getAssetNumber(),MatchMode.ANYWHERE));
			}
			//if(filter.getAssetState()!=null&&!filter.getAssetState().equals("no")){
			//	cri.add(Restrictions.like("assetState", filter.getAssetState()));
			//}
			if(filter.getAssetUseType()!=null&&!filter.getAssetUseType().equals("2")){
				cri.add(Restrictions.like("assetUseType", filter.getAssetUseType(),MatchMode.ANYWHERE));
			}
			//if(filter.getAssetFactory()!=null&&!filter.getAssetFactory().equals("")){
			//	cri.add(Restrictions.like("assetFactory", filter.getAssetFactory()));
		//	}
		//	if(filter.getAssetModelType()!=null&&!filter.getAssetModelType().equals("")){
		//		cri.add(Restrictions.like("assetModelType", filter.getAssetModelType()));
		//	}
		}
		List<Asset> list=cri.list();
		return list;
		
		
	}

}
