package com.mms.dao;

import java.util.List;

import com.mms.pojo.Asset;

public interface ICheck {
	
	//���ʲ���������
	public List<Asset> serchByType(Integer typeid);
	//���ʲ��������
	public List<Asset> serchByNumber(String assetNumber);
	//���ʲ���������
	public List<Asset> serchByName(String assetName);
	//���ʲ�ʹ����������
	public List<Asset> serchByUseType(String assetUseType);
}
