package com.mms.daoImp;

import java.util.List;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IEmployee;
import com.mms.pojo.Employee;

public class EmployeeImp extends HibernateDaoSupport implements IEmployee {
	
	private static final Log log=LogFactory.getLog(EmployeeImp.class);

	public void delete(Employee employee) {
		try{
			this.getHibernateTemplate().delete(employee);
		}catch(RuntimeException re){
			log.error("删除出错");
			throw re;
		}
	}

	public List<Employee> findAll() {
		try{
			List<Employee> list=this.getHibernateTemplate().find("from Employee");
			return list;
		}catch(RuntimeException re){
			log.error("查找全部出错");
			throw re;
		}
	}

	public Employee findById(Integer id) {
		try{
			Employee employee = (Employee) this.getHibernateTemplate().get(Employee.class, id);
			return employee;
		}catch(RuntimeException re){
			log.error("查找实例出错");
			throw re;
		}
	}

	public void insert(Employee employee) {
		try{
			this.getHibernateTemplate().save(employee);
		}catch(RuntimeException re){
			log.error("添加出错");
			throw re;
		}
	}

	public void update(Employee employee) {
		try{
			this.getHibernateTemplate().update(employee);
		}catch(RuntimeException re){
			log.error("更新出错");
			throw re;
		}
	}

}
