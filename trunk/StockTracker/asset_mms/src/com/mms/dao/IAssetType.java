package com.mms.dao;

import java.util.List;

import com.mms.pojo.AssetType;



public interface IAssetType {

	public void sou(AssetType assettype);
	public void delete(AssetType assettype);	
	public List<AssetType> findAll();
	public AssetType findById(Integer id);
	
}
