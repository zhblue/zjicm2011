package com.mms.dao;

import java.util.List;

import com.mms.pojo.TUser;

public interface ITUser {
	public TUser getUser(String userName);
	public void sou(TUser user);
	public void delete(TUser user);
	public TUser findById(Integer id);
	public List<TUser> findAll();
}
