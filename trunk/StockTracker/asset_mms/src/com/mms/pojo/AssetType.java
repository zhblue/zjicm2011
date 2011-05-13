package com.mms.pojo;

import java.util.HashSet;
import java.util.Set;

/**
 * AssetType entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class AssetType implements java.io.Serializable {

	// Fields

	private Integer assetTypeId;
	private String assetTypeNumber;
	private String assetTypeName;
	private String assetTypeDecp;
	private Set assets = new HashSet(0);

	// Constructors

	/** default constructor */
	public AssetType() {
	}

	public AssetType(Integer assetTypeId) {
		this.assetTypeId = assetTypeId;
	}

	/** minimal constructor */
	public AssetType(String assetTypeNumber, String assetTypeName,
			String assetTypeDecp) {
		this.assetTypeNumber = assetTypeNumber;
		this.assetTypeName = assetTypeName;
		this.assetTypeDecp = assetTypeDecp;
	}

	/** full constructor */
	public AssetType(String assetTypeNumber, String assetTypeName,
			String assetTypeDecp, Set assets) {
		this.assetTypeNumber = assetTypeNumber;
		this.assetTypeName = assetTypeName;
		this.assetTypeDecp = assetTypeDecp;
		this.assets = assets;
	}

	// Property accessors

	public Integer getAssetTypeId() {
		return this.assetTypeId;
	}

	public void setAssetTypeId(Integer assetTypeId) {
		this.assetTypeId = assetTypeId;
	}

	public String getAssetTypeNumber() {
		return this.assetTypeNumber;
	}

	public void setAssetTypeNumber(String assetTypeNumber) {
		this.assetTypeNumber = assetTypeNumber;
	}

	public String getAssetTypeName() {
		return this.assetTypeName;
	}

	public void setAssetTypeName(String assetTypeName) {
		this.assetTypeName = assetTypeName;
	}

	public String getAssetTypeDecp() {
		return this.assetTypeDecp;
	}

	public void setAssetTypeDecp(String assetTypeDecp) {
		this.assetTypeDecp = assetTypeDecp;
	}

	public Set getAssets() {
		return this.assets;
	}

	public void setAssets(Set assets) {
		this.assets = assets;
	}

}