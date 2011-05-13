package com.mms.pojo;

import java.util.HashSet;
import java.util.Set;

/**
 * TUser entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class TUser implements java.io.Serializable {

	// Fields

	private Integer userId;
	private Role role;
	private String userName;
	private String userPassword;
	private Integer telNum;
	private Set employees = new HashSet(0);

	// Constructors

	/** default constructor */
	public TUser() {
	}

	/** minimal constructor */
	public TUser(String userName, String userPassword) {
		this.userName = userName;
		this.userPassword = userPassword;
	}

	/** full constructor */
	public TUser(Role role, String userName, String userPassword, Set employees) {
		this.role = role;
		this.userName = userName;
		this.userPassword = userPassword;
		this.employees = employees;
	}

	// Property accessors

	public Integer getUserId() {
		return this.userId;
	}

	public void setUserId(Integer userId) {
		this.userId = userId;
	}

	public Role getRole() {
		return this.role;
	}

	public void setRole(Role role) {
		this.role = role;
	}

	public String getUserName() {
		return this.userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getUserPassword() {
		return this.userPassword;
	}

	public void setUserPassword(String userPassword) {
		this.userPassword = userPassword;
	}

	public Set getEmployees() {
		return this.employees;
	}

	public void setEmployees(Set employees) {
		this.employees = employees;
	}

	public Integer getTelNum() {
		return telNum;
	}

	public void setTelNum(Integer telNum) {
		this.telNum = telNum;
	}

	

}