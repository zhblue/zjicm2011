package com.mms.pojo;

import java.util.Date;

/**
 * Fix entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Fix implements java.io.Serializable {

	// Fields

	private Integer fixId;
	private Asset asset;
	private Employee employeeByFixReportId;
	private Employee employeeByFixCheckAdmin;
	private Date fixReportTime;
	private Date fixTimePre;
	private Date fixTimeReturn;
	private Date fixTimeCheck;
	private Double fixPrice;
	private String fixCheckFactory;
	private String fixReason;
    private String fixState;
	// Constructors

	public String getFixState() {
		return fixState;
	}

	public void setFixState(String fixState) {
		this.fixState = fixState;
	}

	/** default constructor */
	public Fix() {
	}

	/** minimal constructor */
	public Fix(Date fixReportTime, Date fixTimePre, Date fixTimeReturn,
			Date fixTimeCheck, Double fixPrice, String fixCheckFactory,
			String fixReason) {
		this.fixReportTime = fixReportTime;
		this.fixTimePre = fixTimePre;
		this.fixTimeReturn = fixTimeReturn;
		this.fixTimeCheck = fixTimeCheck;
		this.fixPrice = fixPrice;
		this.fixCheckFactory = fixCheckFactory;
		this.fixReason = fixReason;
	}

	/** full constructor */
	public Fix(Asset asset, Employee employeeByFixReportId,
			Employee employeeByFixCheckAdmin, Date fixReportTime,
			Date fixTimePre, Date fixTimeReturn, Date fixTimeCheck,
			Double fixPrice, String fixCheckFactory, String fixReason) {
		this.asset = asset;
		this.employeeByFixReportId = employeeByFixReportId;
		this.employeeByFixCheckAdmin = employeeByFixCheckAdmin;
		this.fixReportTime = fixReportTime;
		this.fixTimePre = fixTimePre;
		this.fixTimeReturn = fixTimeReturn;
		this.fixTimeCheck = fixTimeCheck;
		this.fixPrice = fixPrice;
		this.fixCheckFactory = fixCheckFactory;
		this.fixReason = fixReason;
	}

	// Property accessors

	public Integer getFixId() {
		return this.fixId;
	}

	public void setFixId(Integer fixId) {
		this.fixId = fixId;
	}

	public Asset getAsset() {
		return this.asset;
	}

	public void setAsset(Asset asset) {
		this.asset = asset;
	}

	public Employee getEmployeeByFixReportId() {
		return this.employeeByFixReportId;
	}

	public void setEmployeeByFixReportId(Employee employeeByFixReportId) {
		this.employeeByFixReportId = employeeByFixReportId;
	}

	public Employee getEmployeeByFixCheckAdmin() {
		return this.employeeByFixCheckAdmin;
	}

	public void setEmployeeByFixCheckAdmin(Employee employeeByFixCheckAdmin) {
		this.employeeByFixCheckAdmin = employeeByFixCheckAdmin;
	}

	public Date getFixReportTime() {
		return this.fixReportTime;
	}

	public void setFixReportTime(Date fixReportTime) {
		this.fixReportTime = fixReportTime;
	}

	public Date getFixTimePre() {
		return this.fixTimePre;
	}

	public void setFixTimePre(Date fixTimePre) {
		this.fixTimePre = fixTimePre;
	}

	public Date getFixTimeReturn() {
		return this.fixTimeReturn;
	}

	public void setFixTimeReturn(Date fixTimeReturn) {
		this.fixTimeReturn = fixTimeReturn;
	}

	public Date getFixTimeCheck() {
		return this.fixTimeCheck;
	}

	public void setFixTimeCheck(Date fixTimeCheck) {
		this.fixTimeCheck = fixTimeCheck;
	}

	public Double getFixPrice() {
		return this.fixPrice;
	}

	public void setFixPrice(Double fixPrice) {
		this.fixPrice = fixPrice;
	}

	public String getFixCheckFactory() {
		return this.fixCheckFactory;
	}

	public void setFixCheckFactory(String fixCheckFactory) {
		this.fixCheckFactory = fixCheckFactory;
	}

	public String getFixReason() {
		return this.fixReason;
	}

	public void setFixReason(String fixReason) {
		this.fixReason = fixReason;
	}

}