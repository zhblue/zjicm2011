/*
 * Generated by MyEclipse Struts
 * Template path: templates/java/JavaClass.vtl
 */
package com.mms.struts.form;

import org.apache.struts.action.ActionForm;



/** 
 * MyEclipse Struts
 * Creation date: 10-13-2009
 * 
 * XDoclet definition:
 * @struts.form name="assetForm"
 */
public class StockForm extends ActionForm {
	/**
	 *
	 */
	private static final long serialVersionUID = 1L;
	private Integer stockId;
	private String stockName;
	private String stockCode;
	private String stockInfo;
	/////////////////////////
	private Integer degisnId;
	private Integer userId;
	private Integer stock_id;
	private Long max;
	private Long min;
	private Long diff;
	public Integer getStockId() {
		return stockId;
	}
	public void setStockId(Integer stockId) {
		this.stockId = stockId;
	}
	public String getStockName() {
		return stockName;
	}
	public void setStockName(String stockName) {
		this.stockName = stockName;
	}
	public String getStockCode() {
		return stockCode;
	}
	public void setStockCode(String stockCode) {
		this.stockCode = stockCode;
	}
	public String getStockInfo() {
		return stockInfo;
	}
	public void setStockInfo(String stockInfo) {
		this.stockInfo = stockInfo;
	}
	public Integer getDegisnId() {
		return degisnId;
	}
	public void setDegisnId(Integer degisnId) {
		this.degisnId = degisnId;
	}
	public Integer getUserId() {
		return userId;
	}
	public void setUserId(Integer userId) {
		this.userId = userId;
	}
	public Long getMax() {
		return max;
	}
	public void setMax(Long max) {
		this.max = max;
	}
	public Long getMin() {
		return min;
	}
	public void setMin(Long min) {
		this.min = min;
	}
	public Long getDiff() {
		return diff;
	}
	public void setDiff(Long diff) {
		this.diff = diff;
	}
	public Integer getStock_id() {
		return stock_id;
	}
	public void setStock_id(Integer stock_id) {
		this.stock_id = stock_id;
	}
	
	
}