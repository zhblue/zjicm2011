package com.mms.dao;

import java.util.List;

import org.hibernate.LockMode;

import com.mms.pojo.Asset;
import com.mms.pojo.Degisn;

public interface IDesign {

	public void update(Degisn transientInstance);
	public void save(Degisn transientInstance);
	public void delete(Degisn persistentInstance) ;
	public Degisn findById(java.lang.Integer id);
	public List<Degisn> findByExample(Degisn instance);
	public List<Degisn> findByProperty(String propertyName, Object value);
	public List<Degisn> findByUserId(Object userId);
	public List<Degisn> findByStockId(Object stockId);
	public List<Degisn> findByMax(Object max);
	public List<Degisn> findByMin(Object min) ;
	public List<Degisn> findByDiff(Object diff);
	public List<Degisn> findAll();
	public Degisn merge(Degisn detachedInstance);
	public void attachDirty(Degisn instance);
	public void attachClean(Degisn instance);

}
