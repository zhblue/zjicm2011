package com.mms.dao;

import java.util.List;

import com.mms.pojo.Borrow;



public interface IBorrow {

	public void insert(Borrow borrow);
	public void update(Borrow borrow);
	public void delete(Borrow borrow);
	
	public Borrow findById(Integer id);
	public List<Borrow> findAll();
	
}
