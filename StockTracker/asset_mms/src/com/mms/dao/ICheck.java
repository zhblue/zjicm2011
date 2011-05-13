package com.mms.dao;

import java.util.List;

import com.mms.pojo.Asset;

public interface ICheck {
	
	//按资产类型搜索
	public List<Asset> serchByType(Integer typeid);
	//按资产编号搜索
	public List<Asset> serchByNumber(String assetNumber);
	//按资产名称搜索
	public List<Asset> serchByName(String assetName);
	//按资产使用类型搜索
	public List<Asset> serchByUseType(String assetUseType);
}
