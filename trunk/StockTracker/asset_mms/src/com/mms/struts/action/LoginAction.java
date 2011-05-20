/*
 * Generated by MyEclipse Struts
 * Template path: templates/java/JavaClass.vtl
 */
package com.mms.struts.action;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.struts.action.Action;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionForward;
import org.apache.struts.action.ActionMapping;
import org.apache.struts.actions.DispatchAction;

import com.mms.dao.ITUser;
import com.mms.pojo.Role;
import com.mms.pojo.TUser;
import com.mms.service.ILogin;
import com.mms.struts.form.LoginForm;

/**
 * MyEclipse Struts Creation date: 10-12-2009
 * 
 * XDoclet definition:
 * 
 * @struts.action validate="true"
 */
public class LoginAction extends DispatchAction {
	/*
	 * Generated Methods
	 */
	private ITUser it;
	private ILogin login;

	public ILogin getLogin() {
		return login;
	}

	public void setLogin(ILogin login) {
		this.login = login;
	}

	/**
	 * Method execute
	 * 
	 * @param mapping
	 * @param form
	 * @param request
	 * @param response
	 * @return ActionForward
	 */
	public ActionForward login(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		LoginForm loginForm = (LoginForm) form;
		String name = loginForm.getUserName();
		String password = loginForm.getPassword();
		

		TUser tuser = new TUser();
		tuser.setUserName(name);
		tuser.setUserPassword(password);

		TUser newuser = login.userLogin(tuser);
		

		if (newuser != null) {
			
			request.getSession().setAttribute("passed", "true");
			request.getSession().setAttribute("user",newuser );
			return mapping.findForward("success");
		} else {
			return mapping.findForward("failure");
		}
	}
	public ActionForward regedit(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		LoginForm login = (LoginForm) form;
		TUser user = new TUser();
		Role r = new Role();
		r.setRoleId(2);
		user.setUserName(login.getUserName());
		user.setUserPassword(login.getPassword());
		user.setTelNum(login.getTelNum());
		user.setRole(r);
		it.sou(user);
		return mapping.findForward("toLogin");
		
	}

	public ITUser getIt() {
		return it;
	}

	public void setIt(ITUser it) {
		this.it = it;
	}
}