package com.mms.serviceImp;

import java.util.List;

import com.mms.dao.IAsset;
import com.mms.pojo.Asset;
import com.mms.service.IAssetService;

public class AssetServiceImp implements IAssetService {

	private IAsset ai;

	public IAsset getAi() {
		return ai;
	}

	public void setAi(IAsset ai) {
		this.ai = ai;
	}

	public void addAsset(Asset asset) {
		ai.insert(asset);
	}
    public List listAll() {
		
		return ai.findAll();
	}

	public Asset findById(Integer id) {
		
		return ai.findById(id);
	}

	public void updateAsset(Asset asset) {
		ai.update(asset);
		
	}

	public void deleteAsset(Asset asset) {
		ai.delete(asset);
		
	}

	public Asset findByName(String name) {
		return null;
	}

	

	
	
}
