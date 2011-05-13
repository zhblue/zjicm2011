package com.mms.service;

import java.util.List;

import com.mms.pojo.Borrow;

public interface IBorrowService {
	public Borrow findBorrowById(Integer id);
	public void updateBorrow(Borrow borrow);
	public void insertBorrow(Borrow borrow);
	public List<Borrow> findAllBorrow();
}
