
package com.mms.struts.form;

import java.util.Date;

import javax.servlet.http.HttpServletRequest;
import org.apache.struts.action.ActionErrors;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionMapping;

import com.mms.pojo.Asset;
import com.mms.pojo.Employee;

/** 
 * MyEclipse Struts
 * Creation date: 10-16-2009
 * 
 * XDoclet definition:
 * @struts.form name="fixForm"
 */
public class FixForm extends ActionForm {


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
	
	private String refixReportTime;
	private String refixTimePre;
	private Integer assetId;
	private String refixPrice;

	public String getRefixPrice() {
		return refixPrice;
	}

	public void setRefixPrice(String refixPrice) {
		this.refixPrice = refixPrice;
	}

	public Integer getAssetId() {
		return assetId;
	}

	public void setAssetId(Integer assetId) {
		this.assetId = assetId;
	}

	public String getRefixReportTime() {
		return refixReportTime;
	}

	public void setRefixReportTime(String refixReportTime) {
		this.refixReportTime = refixReportTime;
	}

	public String getRefixTimePre() {
		return refixTimePre;
	}

	public void setRefixTimePre(String refixTimePre) {
		this.refixTimePre = refixTimePre;
	}

	public Asset getAsset() {
		return asset;
	}

	public void setAsset(Asset asset) {
		this.asset = asset;
	}

	public Employee getEmployeeByFixReportId() {
		return employeeByFixReportId;
	}

	public void setEmployeeByFixReportId(Employee employeeByFixReportId) {
		this.employeeByFixReportId = employeeByFixReportId;
	}

	public Employee getEmployeeByFixCheckAdmin() {
		return employeeByFixCheckAdmin;
	}

	public void setEmployeeByFixCheckAdmin(Employee employeeByFixCheckAdmin) {
		this.employeeByFixCheckAdmin = employeeByFixCheckAdmin;
	}

	public Date getFixReportTime() {
		return fixReportTime;
	}

	public void setFixReportTime(Date fixReportTime) {
		this.fixReportTime = fixReportTime;
	}

	public Date getFixTimePre() {
		return fixTimePre;
	}

	public void setFixTimePre(Date fixTimePre) {
		this.fixTimePre = fixTimePre;
	}

	public Date getFixTimeReturn() {
		return fixTimeReturn;
	}

	public void setFixTimeReturn(Date fixTimeReturn) {
		this.fixTimeReturn = fixTimeReturn;
	}

	public Date getFixTimeCheck() {
		return fixTimeCheck;
	}

	public void setFixTimeCheck(Date fixTimeCheck) {
		this.fixTimeCheck = fixTimeCheck;
	}

	public Double getFixPrice() {
		return fixPrice;
	}

	public void setFixPrice(Double fixPrice) {
		this.fixPrice = fixPrice;
	}

	public String getFixCheckFactory() {
		return fixCheckFactory;
	}

	public void setFixCheckFactory(String fixCheckFactory) {
		this.fixCheckFactory = fixCheckFactory;
	}

	public String getFixReason() {
		return fixReason;
	}

	public void setFixReason(String fixReason) {
		this.fixReason = fixReason;
	}

	public ActionErrors validate(ActionMapping mapping,
			HttpServletRequest request) {
		// TODO Auto-generated method stub
		return null;
	}

	/** 
	 * Method reset
	 * @param mapping
	 * @param request
	 */
	public void reset(ActionMapping mapping, HttpServletRequest request) {
		// TODO Auto-generated method stub
	}
}