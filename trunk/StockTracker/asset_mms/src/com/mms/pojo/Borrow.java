package com.mms.pojo;

import java.util.Date;

/**
 * Borrow entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Borrow implements java.io.Serializable {

	// Fields

	private Integer borrowId;
	private Asset asset;
	private Employee employeeByBorrowAdminCheck;
	private Employee employeeByUserId;
	private Date borrowTime;
	private Date borrowReturnTimeAp;
	private Date borrowReturnTime;   //归还时间
	private Date borrowBorrowedTime; //审批时间
	private String borrowState;

	// Constructors

	public String getBorrowState() {
		return borrowState;
	}

	public void setBorrowState(String borrowState) {
		this.borrowState = borrowState;
	}

	/** default constructor */
	public Borrow() {
	}

	/** minimal constructor */
	public Borrow(Date borrowTime, Date borrowReturnTimeAp,
			Date borrowReturnTime, Date borrowBorrowedTime) {
		this.borrowTime = borrowTime;
		this.borrowReturnTimeAp = borrowReturnTimeAp;
		this.borrowReturnTime = borrowReturnTime;
		this.borrowBorrowedTime = borrowBorrowedTime;
	}

	/** full constructor */
	public Borrow(Asset asset, Employee employeeByBorrowAdminCheck,
			Employee employeeByUserId, Date borrowTime,
			Date borrowReturnTimeAp, Date borrowReturnTime,
			Date borrowBorrowedTime) {
		this.asset = asset;
		this.employeeByBorrowAdminCheck = employeeByBorrowAdminCheck;
		this.employeeByUserId = employeeByUserId;
		this.borrowTime = borrowTime;
		this.borrowReturnTimeAp = borrowReturnTimeAp;
		this.borrowReturnTime = borrowReturnTime;
		this.borrowBorrowedTime = borrowBorrowedTime;
	}

	// Property accessors

	public Integer getBorrowId() {
		return this.borrowId;
	}

	public void setBorrowId(Integer borrowId) {
		this.borrowId = borrowId;
	}

	public Asset getAsset() {
		return this.asset;
	}

	public void setAsset(Asset asset) {
		this.asset = asset;
	}

	public Employee getEmployeeByBorrowAdminCheck() {
		return this.employeeByBorrowAdminCheck;
	}

	public void setEmployeeByBorrowAdminCheck(
			Employee employeeByBorrowAdminCheck) {
		this.employeeByBorrowAdminCheck = employeeByBorrowAdminCheck;
	}

	public Employee getEmployeeByUserId() {
		return this.employeeByUserId;
	}

	public void setEmployeeByUserId(Employee employeeByUserId) {
		this.employeeByUserId = employeeByUserId;
	}

	public Date getBorrowTime() {
		return this.borrowTime;
	}

	public void setBorrowTime(Date borrowTime) {
		this.borrowTime = borrowTime;
	}

	public Date getBorrowReturnTimeAp() {
		return this.borrowReturnTimeAp;
	}

	public void setBorrowReturnTimeAp(Date borrowReturnTimeAp) {
		this.borrowReturnTimeAp = borrowReturnTimeAp;
	}

	public Date getBorrowReturnTime() {
		return this.borrowReturnTime;
	}

	public void setBorrowReturnTime(Date borrowReturnTime) {
		this.borrowReturnTime = borrowReturnTime;
	}

	public Date getBorrowBorrowedTime() {
		return this.borrowBorrowedTime;
	}

	public void setBorrowBorrowedTime(Date borrowBorrowedTime) {
		this.borrowBorrowedTime = borrowBorrowedTime;
	}

}