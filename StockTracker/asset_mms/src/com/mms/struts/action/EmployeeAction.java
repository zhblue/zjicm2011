/*
 * Generated by MyEclipse Struts
 * Template path: templates/java/JavaClass.vtl
 */
package com.mms.struts.action;

import java.lang.reflect.InvocationTargetException;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.beanutils.BeanUtils;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionForward;
import org.apache.struts.action.ActionMapping;
import org.apache.struts.actions.DispatchAction;

import com.mms.dao.IEmployee;
import com.mms.dao.IRole;
import com.mms.dao.ITUser;
import com.mms.pojo.Employee;
import com.mms.pojo.Role;
import com.mms.pojo.TUser;
import com.mms.serviceImp.EmployeeServiceImp;
import com.mms.struts.form.EmployeeForm;

/** 
 * MyEclipse Struts
 * Creation date: 10-14-2009
 * 
 * XDoclet definition:
 * @struts.action path="/employee" name="employeeForm" scope="request" validate="true"
 */
public class EmployeeAction extends DispatchAction {
	
	private EmployeeServiceImp esi;
	public EmployeeServiceImp getEsi() {
		return esi;
	}
	public void setEsi(EmployeeServiceImp esi) {
		this.esi = esi;
	}
	
	private IRole r;
	
	private ITUser tu;
	
	public ITUser getTu() {
		return tu;
	}
	public void setTu(ITUser tu) {
		this.tu = tu;
	}
	public IRole getR() {
		return r;
	}
	public void setR(IRole r) {
		this.r = r;
	}
	//用户编辑页面
	public ActionForward edit(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		EmployeeForm employeeForm = (EmployeeForm) form;
		
		
		return mapping.findForward("useredit");
	}
	//列出用户列表
	public ActionForward list(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response)
	{
		TUser curr_user = new TUser();
		curr_user=(TUser)request.getSession().getAttribute("user");
		request.setAttribute("tuser", curr_user);
		return mapping.findForward("listuser");
	}
	//保存用户修改信息
	public ActionForward saveuser(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response)
	{
		EmployeeForm emp = (EmployeeForm) form;
		TUser cuser = new TUser();
		cuser = (TUser)request.getSession().getAttribute("user");
		cuser.setUserName(emp.getUserName());
		cuser.setUserPassword(emp.getUserPassword());
		cuser.setTelNum(emp.getEmpTelnum());
		tu.sou(cuser);
		return mapping.findForward("saveuser");
	}
	public ActionForward delete(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		Employee emp=new Employee();
		String id=request.getParameter("m");
		Integer id1=Integer.parseInt(id);
		emp=esi.findEmployeeById(id1);
		TUser tuser=new TUser();
		tuser=emp.getTUser();
			emp.setTUser(null);
			esi.update(emp);
			esi.deleteEmployee(emp);
			tu.delete(tuser);
			return mapping.findForward("emp");
		
	}
	
	public ActionForward listinfo(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		Employee emp=new Employee();
		String id=request.getParameter("m");
		Integer id1=Integer.parseInt(id);
		emp=esi.findEmployeeById(id1);		
		request.setAttribute("edit", emp);
		return mapping.findForward("info");
	}
	public ActionForward update(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		EmployeeForm employeeForm = (EmployeeForm) form;
		Role role=new Role();	
		String rid=employeeForm.getRole();
		Integer rid1=Integer.parseInt(rid);
		role=r.findById(rid1);
		role.setRoleId(Integer.parseInt(employeeForm.getRole()));
		TUser user=new TUser();
		String uid=(String)request.getParameter("userId");
		Integer uid1=Integer.parseInt(uid);
		
		user=tu.findById(uid1);
		user.setUserName(employeeForm.getUserName());
		user.setUserPassword(employeeForm.getUserPassword()); 
		user.setRole(role);
		tu.sou(user);
		Employee employee=new Employee();
		String eid=(String)request.getParameter("empId");
		Integer eid1=Integer.parseInt(eid);
		try {
			BeanUtils.copyProperties(employee, employeeForm);
		} catch (IllegalAccessException e) {
			e.printStackTrace();
		} catch (InvocationTargetException e) {
			e.printStackTrace();
		}
		employee=esi.findEmployeeById(eid1);
		employee.setTUser(user);
		employee.setEmpSex(employeeForm.getEmpSex());
		esi.update(employee);
		return mapping.findForward("emp");
	}
	
}