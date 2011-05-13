package com.mms.daoImp;

import java.util.List;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.hibernate.LockMode;
import org.springframework.context.ApplicationContext;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

import com.mms.dao.IDesign;
import com.mms.pojo.Degisn;

/**
 * A data access object (DAO) providing persistence and search support for
 * Degisn entities. Transaction control of the save(), update() and delete()
 * operations can directly support Spring container-managed transactions or they
 * can be augmented to handle user-managed Spring transactions. Each of these
 * methods provides additional information for how to configure it for the
 * desired type of transaction control.
 * 
 * @see com.mms.daoImp.Degisn
 * @author MyEclipse Persistence Tools
 */

public class DegisnImp extends HibernateDaoSupport implements IDesign{
	private static final Log log = LogFactory.getLog(DegisnImp.class);
	// property constants
	public static final String USER_ID = "userId";
	public static final String STOCK_ID = "stockId";
	public static final String MAX = "max";
	public static final String MIN = "min";
	public static final String DIFF = "diff";

	protected void initDao() {
		// do nothing
	}

	public void save(Degisn transientInstance) {
		log.debug("saving Degisn instance");
		try {
			getHibernateTemplate().save(transientInstance);
			log.debug("save successful");
		} catch (RuntimeException re) {
			log.error("save failed", re);
			throw re;
		}
	}

	public void delete(Degisn persistentInstance) {
		log.debug("deleting Degisn instance");
		try {
			getHibernateTemplate().delete(persistentInstance);
			log.debug("delete successful");
		} catch (RuntimeException re) {
			log.error("delete failed", re);
			throw re;
		}
	}

	public Degisn findById(java.lang.Integer id) {
		log.debug("getting Degisn instance with id: " + id);
		try {
			Degisn instance = (Degisn) getHibernateTemplate().get(
					"com.mms.pojo.Degisn", id);
			return instance;
		} catch (RuntimeException re) {
			log.error("get failed", re);
			throw re;
		}
	}

	public List findByExample(Degisn instance) {
		log.debug("finding Degisn instance by example");
		try {
			List results = getHibernateTemplate().findByExample(instance);
			log.debug("find by example successful, result size: "
					+ results.size());
			return results;
		} catch (RuntimeException re) {
			log.error("find by example failed", re);
			throw re;
		}
	}

	public List findByProperty(String propertyName, Object value) {
		log.debug("finding Degisn instance with property: " + propertyName
				+ ", value: " + value);
		try {
			String queryString = "from Degisn as model where model."
					+ propertyName + "= ?";
			return getHibernateTemplate().find(queryString, value);
		} catch (RuntimeException re) {
			log.error("find by property name failed", re);
			throw re;
		}
	}

	public List findByUserId(Object userId) {
		return findByProperty(USER_ID, userId);
	}

	public List findByStockId(Object stockId) {
		return findByProperty(STOCK_ID, stockId);
	}

	public List findByMax(Object max) {
		return findByProperty(MAX, max);
	}

	public List findByMin(Object min) {
		return findByProperty(MIN, min);
	}

	public List findByDiff(Object diff) {
		return findByProperty(DIFF, diff);
	}

	public List findAll() {
		log.debug("finding all Degisn instances");
		try {
			String queryString = "from Degisn";
			return getHibernateTemplate().find(queryString);
		} catch (RuntimeException re) {
			log.error("find all failed", re);
			throw re;
		}
	}

	public Degisn merge(Degisn detachedInstance) {
		log.debug("merging Degisn instance");
		try {
			Degisn result = (Degisn) getHibernateTemplate().merge(
					detachedInstance);
			log.debug("merge successful");
			return result;
		} catch (RuntimeException re) {
			log.error("merge failed", re);
			throw re;
		}
	}

	public void attachDirty(Degisn instance) {
		log.debug("attaching dirty Degisn instance");
		try {
			getHibernateTemplate().saveOrUpdate(instance);
			log.debug("attach successful");
		} catch (RuntimeException re) {
			log.error("attach failed", re);
			throw re;
		}
	}

	public void attachClean(Degisn instance) {
		log.debug("attaching clean Degisn instance");
		try {
			getHibernateTemplate().lock(instance, LockMode.NONE);
			log.debug("attach successful");
		} catch (RuntimeException re) {
			log.error("attach failed", re);
			throw re;
		}
	}

	public static DegisnImp getFromApplicationContext(ApplicationContext ctx) {
		return (DegisnImp) ctx.getBean("DegisnDAO");
	}

	public void update(Degisn transientInstance) {
		log.debug("update Degisn instance");
		try {
			getHibernateTemplate().update(transientInstance);
			log.debug("update successful");
		} catch (RuntimeException re) {
			log.error("update failed", re);
			throw re;
		}
		
	}
}