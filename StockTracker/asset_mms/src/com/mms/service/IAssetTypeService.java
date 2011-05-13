package com.mms.service;

import com.mms.pojo.AssetType;

public interface IAssetTypeService {
     public void addType(AssetType assetType);
     public void deleteType(AssetType assettype);
     public AssetType findTypeById(Integer id);
     public void updateType(AssetType assettype);
}
