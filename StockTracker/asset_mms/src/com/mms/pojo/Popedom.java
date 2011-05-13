package com.mms.pojo;

import java.util.HashSet;
import java.util.Set;

/**
 * Popedom entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Popedom implements java.io.Serializable {

	// Fields

	private Integer popedomId;
	private String popedomName;
	private String popedomPath;
	private String popedomPam;
	private Set roles = new HashSet(0);

	// Constructors

	/** default constructor */
	public Popedom() {
	}

	/** minimal constructor */
	public Popedom(String popedomName, String popedomPath, String popedomPam) {
		this.popedomName = popedomName;
		this.popedomPath = popedomPath;
		this.popedomPam = popedomPam;
	}

	/** full constructor */
	public Popedom(String popedomName, String popedomPath, String popedomPam,
			Set roles) {
		this.popedomName = popedomName;
		this.popedomPath = popedomPath;
		this.popedomPam = popedomPam;
		this.roles = roles;
	}

	// Property accessors

	public Integer getPopedomId() {
		return this.popedomId;
	}

	public void setPopedomId(Integer popedomId) {
		this.popedomId = popedomId;
	}

	public String getPopedomName() {
		return this.popedomName;
	}

	public void setPopedomName(String popedomName) {
		this.popedomName = popedomName;
	}

	public String getPopedomPath() {
		return this.popedomPath;
	}

	public void setPopedomPath(String popedomPath) {
		this.popedomPath = popedomPath;
	}

	public String getPopedomPam() {
		return this.popedomPam;
	}

	public void setPopedomPam(String popedomPam) {
		this.popedomPam = popedomPam;
	}

	public Set getRoles() {
		return this.roles;
	}

	public void setRoles(Set roles) {
		this.roles = roles;
	}

}