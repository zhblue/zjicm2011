package com.mms.dao;

import java.util.List;

import com.mms.pojo.Employee;



public interface IEmployee {
	
	public void insert(Employee employee);
	public void update(Employee employee);
	public void delete(Employee employee);
	
	public Employee findById(Integer id);
	public List<Employee> findAll();
	
}
