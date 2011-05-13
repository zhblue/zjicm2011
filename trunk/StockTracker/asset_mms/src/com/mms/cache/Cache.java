package com.mms.cache;

import java.io.Serializable;
import java.util.Properties;

/**
 * Defina a common Cache interface
 * 
 * @author qrsx
 * 
 */
public interface Cache {
    /**
     * The method of initialize the cache This method may be auto invoked by the
     * DAOFactory after create the cache instance.
     * 
     * @param props
     *            The initial parameters
     */
    public void initialize(Properties props);

    /**
     * The method of put a Object into the cache
     * 
     * @param name
     *            The key of the object
     * @param obj
     *            The Object that was to be putted into the cache
     */
    public void put(String name, Serializable obj);

    /**
     * Get a Object that was putted into the cache
     * 
     * @param name
     *            the key of the object
     * @return the object that has been putted in the cache
     */
    public Object get(String name);

    /**
     * Remove a Object from the cache
     * 
     * @param name
     *            the key of the object
     */
    public void clear(String name);

    /**
     * Remove all the Objects from the cache
     * 
     */
    public void clearAll();
}
