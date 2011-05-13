package com.mms.pojo;

/**
 * Degisn entity.
 * 
 * @author MyEclipse Persistence Tools
 */

public class Degisn implements java.io.Serializable {

	// Fields

	private Integer degisnId;
	private Integer userId;
	private Integer stockId;
	private Long max;
	private Long min;
	private Long diff;

	// Constructors

	/** default constructor */
	public Degisn() {
	}

	/** full constructor */
	public Degisn(Integer userId, Integer stockId, Long max, Long min, Long diff) {
		this.userId = userId;
		this.stockId = stockId;
		this.max = max;
		this.min = min;
		this.diff = diff;
	}

	// Property accessors

	public Integer getDegisnId() {
		return this.degisnId;
	}

	public void setDegisnId(Integer degisnId) {
		this.degisnId = degisnId;
	}

	public Integer getUserId() {
		return this.userId;
	}

	public void setUserId(Integer userId) {
		this.userId = userId;
	}

	public Integer getStockId() {
		return this.stockId;
	}

	public void setStockId(Integer stockId) {
		this.stockId = stockId;
	}

	public Long getMax() {
		return this.max;
	}

	public void setMax(Long max) {
		this.max = max;
	}

	public Long getMin() {
		return this.min;
	}

	public void setMin(Long min) {
		this.min = min;
	}

	public Long getDiff() {
		return this.diff;
	}

	public void setDiff(Long diff) {
		this.diff = diff;
	}

}