package com.mms.serviceImp;

import java.util.List;

import com.mms.dao.IFix;
import com.mms.pojo.Fix;
import com.mms.service.IFixService;

public class FixServiceImp implements IFixService{

	private IFix f;
	public IFix getF() {
		return f;
	}
	public void setF(IFix f) {
		this.f = f;
	}
	

	public void addFix(Fix fix) {
		f.insert(fix);
	}

	public List<Fix> findFixAll() {
		
		return f.findAll();
	}
	public Fix findFixById(Integer id) {
		
		return f.findById(id);
	}
	public void updateFix(Fix fix) {
		
		f.update(fix);
	}

}
