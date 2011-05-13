package com.mms.serviceImp;//业务逻辑层，看不到数据库脚本信息

import com.mms.dao.ITUser;
import com.mms.pojo.TUser;
import com.mms.service.ILogin;

public class LoginImp implements ILogin {

	private ITUser tUser;

	public ITUser getTUser() {
		return tUser;
	}

	public void setTUser(ITUser user) {
		tUser = user;
	}

	public TUser userLogin(TUser tuser) {
		
		TUser newuser = tUser.getUser(tuser.getUserName());
		if (newuser != null
				&& newuser.getUserPassword().equals(tuser.getUserPassword())) {
			return newuser;
		} else
			return null;
	}
}
