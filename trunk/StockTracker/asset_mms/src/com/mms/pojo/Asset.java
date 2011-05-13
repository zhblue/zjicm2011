package com.mms.pojo;

import java.util.Date;
import java.util.HashSet;
import java.util.Set;

/**
 * Asset entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Asset implements java.io.Serializable {

	// Fields

	private Integer assetId;
	private AssetType assetType;
	private Employee employee;
	private String assetNumber;
	private String assetName;
	private String assetUseType;
	private String assetState;
	private Date assetUseToYear;
	private String assetUseTime;
	private Date assetBuyTime;
	private String assetFactory;
	private String assetModelType;
	private Double assetPrice;
	
	private Set<Borrow> borrows = new HashSet<Borrow>(0);
	private Set<Fix> fixes = new HashSet<Fix>(0);

	// Constructors

	/** default constructor */
	public Asset() {
	}

	/** minimal constructor */
	public Asset(String assetNumber, String assetName, String assetUseType,
			String assetState, Date assetUseToYear, String assetUseTime,
			Date assetBuyTime, String assetFactory, String assetModelType,
			Double assetPrice, String assetAdmitUse) {
		this.assetNumber = assetNumber;
		this.assetName = assetName;
		this.assetUseType = assetUseType;
		this.assetState = assetState;
		this.assetUseToYear = assetUseToYear;
		this.assetUseTime = assetUseTime;
		this.assetBuyTime = assetBuyTime;
		this.assetFactory = assetFactory;
		this.assetModelType = assetModelType;
		this.assetPrice = assetPrice;
		
	}

	/** full constructor */
	public Asset(AssetType assetType, String assetNumber, String assetName,
			String assetUseType, String assetState, Date assetUseToYear,
			String assetUseTime, Date assetBuyTime, String assetFactory,
			String assetModelType, Double assetPrice, String assetAdmitUse,
			Set borrows, Set fixes) {
		this.assetType = assetType;
		this.assetNumber = assetNumber;
		this.assetName = assetName;
		this.assetUseType = assetUseType;
		this.assetState = assetState;
		this.assetUseToYear = assetUseToYear;
		this.assetUseTime = assetUseTime;
		this.assetBuyTime = assetBuyTime;
		this.assetFactory = assetFactory;
		this.assetModelType = assetModelType;
		this.assetPrice = assetPrice;
		
		this.borrows = borrows;
		this.fixes = fixes;
	}

	// Property accessors

	public Integer getAssetId() {
		return this.assetId;
	}

	public void setAssetId(Integer assetId) {
		this.assetId = assetId;
	}

	public AssetType getAssetType() {
		return this.assetType;
	}

	public void setAssetType(AssetType assetType) {
		this.assetType = assetType;
	}

	public String getAssetNumber() {
		return this.assetNumber;
	}

	public void setAssetNumber(String assetNumber) {
		this.assetNumber = assetNumber;
	}

	public String getAssetName() {
		return this.assetName;
	}

	public void setAssetName(String assetName) {
		this.assetName = assetName;
	}

	public String getAssetUseType() {
		return this.assetUseType;
	}

	public void setAssetUseType(String assetUseType) {
		this.assetUseType = assetUseType;
	}

	public String getAssetState() {
		return this.assetState;
	}

	public void setAssetState(String assetState) {
		this.assetState = assetState;
	}

	public Date getAssetUseToYear() {
		return this.assetUseToYear;
	}

	public void setAssetUseToYear(Date assetUseToYear) {
		this.assetUseToYear = assetUseToYear;
	}

	public String getAssetUseTime() {
		return this.assetUseTime;
	}

	public void setAssetUseTime(String assetUseTime) {
		this.assetUseTime = assetUseTime;
	}

	public Date getAssetBuyTime() {
		return this.assetBuyTime;
	}

	public void setAssetBuyTime(Date assetBuyTime) {
		this.assetBuyTime = assetBuyTime;
	}

	public String getAssetFactory() {
		return this.assetFactory;
	}

	public void setAssetFactory(String assetFactory) {
		this.assetFactory = assetFactory;
	}

	public String getAssetModelType() {
		return this.assetModelType;
	}

	public void setAssetModelType(String assetModelType) {
		this.assetModelType = assetModelType;
	}

	public Double getAssetPrice() {
		return this.assetPrice;
	}

	public void setAssetPrice(Double assetPrice) {
		this.assetPrice = assetPrice;
	}

	

	public Set getBorrows() {
		return this.borrows;
	}

	public void setBorrows(Set borrows) {
		this.borrows = borrows;
	}

	public Set getFixes() {
		return this.fixes;
	}

	public void setFixes(Set fixes) {
		this.fixes = fixes;
	}

	public Employee getEmployee() {
		return employee;
	}

	public void setEmployee(Employee employee) {
		this.employee = employee;
	}

}