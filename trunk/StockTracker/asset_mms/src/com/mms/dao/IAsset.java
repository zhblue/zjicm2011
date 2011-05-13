package com.mms.dao;

import java.util.List;

import com.mms.pojo.Asset;

public interface IAsset {

	public void insert(Asset asset);
	public void update(Asset asset);
	public void delete(Asset asset);
	
	public List<Asset> findAll();
	public Asset findByName(String name);
	public Asset findById(Integer id);
	public List<Asset> findAll(Asset asset);
}
