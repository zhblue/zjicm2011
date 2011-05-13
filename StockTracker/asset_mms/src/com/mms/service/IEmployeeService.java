package com.mms.service;

import java.util.List;

import com.mms.pojo.Employee;

public interface IEmployeeService {
	public List<Employee> listEmployee();
	public void deleteEmployee(Employee employee);
	public void add(Employee employee);
	public void update(Employee employee);
	public Employee findEmployeeById(Integer id);
}
