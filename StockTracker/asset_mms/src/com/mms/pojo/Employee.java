package com.mms.pojo;

import java.util.HashSet;
import java.util.Set;

/**
 * Employee entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Employee implements java.io.Serializable {

	// Fields

	private Integer empId;
	private TUser TUser;
	private String empNum;
	private String empName;
	private String empManid;
	private String empTelnum;
	private String empSex;
	private String empEmail;
	private String empAddress;
	private Set borrowsForBorrowAdminCheck = new HashSet(0);
	private Set fixesForFixCheckAdmin = new HashSet(0);
	private Set borrowsForUserId = new HashSet(0);
	private Set fixesForFixReportId = new HashSet(0);

	// Constructors

	/** default constructor */
	public Employee(Integer empId) {
		this.empId=empId;
	}
	public Employee() {
	}


	/** minimal constructor */
	public Employee(String empNum, String empName, String empManid,
			String empTelnum, String empSex, String empEmail, String empAddress) {
		this.empNum = empNum;
		this.empName = empName;
		this.empManid = empManid;
		this.empTelnum = empTelnum;
		this.empSex = empSex;
		this.empEmail = empEmail;
		this.empAddress = empAddress;
	}

	/** full constructor */
	public Employee(TUser TUser, String empNum, String empName,
			String empManid, String empTelnum, String empSex, String empEmail,
			String empAddress, Set borrowsForBorrowAdminCheck,
			Set fixesForFixCheckAdmin, Set borrowsForUserId,
			Set fixesForFixReportId) {
		this.TUser = TUser;
		this.empNum = empNum;
		this.empName = empName;
		this.empManid = empManid;
		this.empTelnum = empTelnum;
		this.empSex = empSex;
		this.empEmail = empEmail;
		this.empAddress = empAddress;
		this.borrowsForBorrowAdminCheck = borrowsForBorrowAdminCheck;
		this.fixesForFixCheckAdmin = fixesForFixCheckAdmin;
		this.borrowsForUserId = borrowsForUserId;
		this.fixesForFixReportId = fixesForFixReportId;
	}

	// Property accessors

	public Integer getEmpId() {
		return this.empId;
	}

	public void setEmpId(Integer empId) {
		this.empId = empId;
	}

	public TUser getTUser() {
		return this.TUser;
	}

	public void setTUser(TUser TUser) {
		this.TUser = TUser;
	}

	public String getEmpNum() {
		return this.empNum;
	}

	public void setEmpNum(String empNum) {
		this.empNum = empNum;
	}

	public String getEmpName() {
		return this.empName;
	}

	public void setEmpName(String empName) {
		this.empName = empName;
	}

	public String getEmpManid() {
		return this.empManid;
	}

	public void setEmpManid(String empManid) {
		this.empManid = empManid;
	}

	public String getEmpTelnum() {
		return this.empTelnum;
	}

	public void setEmpTelnum(String empTelnum) {
		this.empTelnum = empTelnum;
	}

	public String getEmpSex() {
		return this.empSex;
	}

	public void setEmpSex(String empSex) {
		this.empSex = empSex;
	}

	public String getEmpEmail() {
		return this.empEmail;
	}

	public void setEmpEmail(String empEmail) {
		this.empEmail = empEmail;
	}

	public String getEmpAddress() {
		return this.empAddress;
	}

	public void setEmpAddress(String empAddress) {
		this.empAddress = empAddress;
	}

	public Set getBorrowsForBorrowAdminCheck() {
		return this.borrowsForBorrowAdminCheck;
	}

	public void setBorrowsForBorrowAdminCheck(Set borrowsForBorrowAdminCheck) {
		this.borrowsForBorrowAdminCheck = borrowsForBorrowAdminCheck;
	}

	public Set getFixesForFixCheckAdmin() {
		return this.fixesForFixCheckAdmin;
	}

	public void setFixesForFixCheckAdmin(Set fixesForFixCheckAdmin) {
		this.fixesForFixCheckAdmin = fixesForFixCheckAdmin;
	}

	public Set getBorrowsForUserId() {
		return this.borrowsForUserId;
	}

	public void setBorrowsForUserId(Set borrowsForUserId) {
		this.borrowsForUserId = borrowsForUserId;
	}

	public Set getFixesForFixReportId() {
		return this.fixesForFixReportId;
	}

	public void setFixesForFixReportId(Set fixesForFixReportId) {
		this.fixesForFixReportId = fixesForFixReportId;
	}

}