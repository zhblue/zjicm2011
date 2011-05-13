package com.mms.serviceImp;

import java.util.List;

import org.hibernate.mapping.Set;

import com.mms.dao.IBorrow;
import com.mms.pojo.Asset;
import com.mms.pojo.Borrow;
import com.mms.service.IBorrowService;

public class BorrowServiceImp implements IBorrowService {

	private IBorrow ib;	
	public IBorrow getIb() {
		return ib;
	}
	public void setIb(IBorrow ib) {
		this.ib = ib;
	}

	public Borrow findBorrowById(Integer id) {
		
		return ib.findById(id);
	}

	public void updateBorrow(Borrow borrow) {

		ib.update(borrow);
		
	}
	public void insertBorrow(Borrow borrow) {
		
		ib.insert(borrow);
		
	}
	public List<Borrow> findAllBorrow() {

		return ib.findAll();
	}

	
}
