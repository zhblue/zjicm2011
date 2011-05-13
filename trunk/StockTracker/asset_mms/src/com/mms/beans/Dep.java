package com.mms.beans;

public class Dep {
	private Integer assetId;
	private String assetName; 
	private String assetType;
	private String assetNumber;
	private String assetUseType;
	private String assetState;
	private String dep;
	public String getAssetName() {
		return assetName;
	}
	public void setAssetName(String assetName) {
		this.assetName = assetName;
	}
	public String getAssetNumber() {
		return assetNumber;
	}
	public void setAssetNumber(String assetNumber) {
		this.assetNumber = assetNumber;
	}
	
	public String getAssetState() {
		return assetState;
	}
	public void setAssetState(String assetState) {
		this.assetState = assetState;
	}
	public String getDep() {
		return dep;
	}
	public void setDep(String dep) {
		this.dep = dep;
	}
	public Integer getAssetId() {
		return assetId;
	}
	public void setAssetId(Integer assetId) {
		this.assetId = assetId;
	}
	public String getAssetUseType() {
		return assetUseType;
	}
	public void setAssetUseType(String assetUseType) {
		this.assetUseType = assetUseType;
	}
	public String getAssetType() {
		return assetType;
	}
	public void setAssetType(String assetType) {
		this.assetType = assetType;
	}
	
}
