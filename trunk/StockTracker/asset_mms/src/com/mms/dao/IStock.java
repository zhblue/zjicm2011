package com.mms.dao;

import java.util.List;


import com.mms.pojo.Stock;

public interface IStock {

	public void save(Stock transientInstance) ;
	public void delete(Stock persistentInstance);
	public Stock findById(java.lang.Integer id) ;
	public List<Stock> findByExample(Stock instance) ;
	public List<Stock> findByProperty(String propertyName, Object value) ;
	public List<Stock> findByStockName(Object stockName) ;
	public List<Stock> findByStockCode(Object stockCode);
	public List<Stock> findByStockInfo(Object stockInfo) ;
	public List<Stock> findAll();
	public Stock merge(Stock detachedInstance) ;
	public void attachDirty(Stock instance) ;
	public void attachClean(Stock instance) ;
	public List listbyuser(String user_id);
	public List liststockbyuser(String user_id);
}
