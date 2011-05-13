package com.mms.dao;

import java.util.List;

import com.mms.pojo.Fix;



public interface IFix {

	public void insert(Fix fix);
	public void update(Fix fix);
	public void delete(Fix fix);
	
	public Fix findById(Integer id);
	public List<Fix> findAll();
	
}
