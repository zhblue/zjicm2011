/*
 * Generated by MyEclipse Struts
 * Template path: templates/java/JavaClass.vtl
 */
package com.mms.struts.form;

import javax.servlet.http.HttpServletRequest;
import org.apache.struts.action.ActionErrors;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionMapping;

/** 
 * MyEclipse Struts
 * Creation date: 10-15-2009
 * 
 * XDoclet definition:
 * @struts.form name="assetTypeForm"
 */
public class AssetTypeForm extends ActionForm {
	private Integer assetTypeId;
	private String assetTypeNumber;
	private String assetTypeName;
	private String assetTypeDecp;
	
	public ActionErrors validate(ActionMapping mapping,
			HttpServletRequest request) {
		// TODO Auto-generated method stub
		return null;
	}

	public String getAssetTypeNumber() {
		return assetTypeNumber;
	}

	public void setAssetTypeNumber(String assetTypeNumber) {
		this.assetTypeNumber = assetTypeNumber;
	}

	public String getAssetTypeName() {
		return assetTypeName;
	}

	public void setAssetTypeName(String assetTypeName) {
		this.assetTypeName = assetTypeName;
	}

	public String getAssetTypeDecp() {
		return assetTypeDecp;
	}

	public void setAssetTypeDecp(String assetTypeDecp) {
		this.assetTypeDecp = assetTypeDecp;
	}


	public void reset(ActionMapping mapping, HttpServletRequest request) {
		// TODO Auto-generated method stub
	}

	public Integer getAssetTypeId() {
		return assetTypeId;
	}

	public void setAssetTypeId(Integer assetTypeId) {
		this.assetTypeId = assetTypeId;
	}
}