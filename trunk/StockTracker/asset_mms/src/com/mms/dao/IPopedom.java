package com.mms.dao;

import java.util.List;

import com.mms.pojo.Popedom;



public interface IPopedom {

	public void insert(Popedom popedom);
	public void update(Popedom popedom);
	public void delete(Popedom popedom);
	
	public Popedom findById(Integer id);
	public List<Popedom> findAll();

}
