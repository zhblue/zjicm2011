package com.mms.dao;

import java.util.List;

import com.mms.pojo.Role;



public interface IRole {

	public void insert(Role role);
	public void update(Role role);
	public void delete(Role role);
	
	public Role findById(Integer id);
	public List<Role> findAll();

}
