package com.mms.service;

import java.util.List;

import com.mms.pojo.Asset;

public interface IAssetService {
	public List<Asset> listAll();
	public void addAsset(Asset asset);
	public Asset findById(Integer id);
	public void updateAsset(Asset asset);
	public void deleteAsset(Asset asset);
	public Asset findByName(String name);
}
