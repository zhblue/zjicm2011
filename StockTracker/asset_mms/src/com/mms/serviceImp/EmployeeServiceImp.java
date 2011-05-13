package com.mms.serviceImp;

import java.util.List;

import com.mms.daoImp.EmployeeImp;
import com.mms.pojo.Employee;
import com.mms.service.IEmployeeService;

public class EmployeeServiceImp implements IEmployeeService {
    private EmployeeImp ei;
	public EmployeeImp getEi() {
		return ei;
	}
	public void setEi(EmployeeImp ei) {
		this.ei = ei;
	}
	
	public List<Employee> listEmployee() {
		
		return ei.findAll();
	}
	public void add(Employee employee) {
		ei.insert(employee);
	}
	public void deleteEmployee(Employee employee) {
		ei.delete(employee);
	}
	public void update(Employee employee) {
		
		ei.update(employee);
	}
	public Employee findEmployeeById(Integer id) {
		
		return ei.findById(id);
	}
	

}
