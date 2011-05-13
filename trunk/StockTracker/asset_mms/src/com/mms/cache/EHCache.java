package com.mms.cache;

import java.io.IOException;
import java.io.Serializable;
import java.util.Properties;

import net.sf.ehcache.Cache;
import net.sf.ehcache.CacheException;
import net.sf.ehcache.CacheManager;
import net.sf.ehcache.Element;

/**
 * 缓存操作接口的实现类
 * 
 * @author mms
 * 
 */
public class EHCache implements com.mms.cache.Cache {
    // 缺省的配置缓存名称的属性名
    public static final String CACHE_NAME = "cachename";

    // 缺省的缓存名称
    public static final String DEFAULT_CACHE_NAME = "mms";

    // 全局的缓存对象的实例
    private Cache cache;

    /**
     * 初始化方法
     */
    public void initialize(Properties props) {
        try {
            // 得到缓存管理对象的实例
            CacheManager manager = CacheManager.getInstance();
            // 得到缓存的名称
            String cachename = DEFAULT_CACHE_NAME;
            if (props != null) {
                cachename = props.getProperty(CACHE_NAME, DEFAULT_CACHE_NAME);
            }
            // 取得缓存对象的实例
            cache = manager.getCache(cachename);
        } catch (CacheException e) {
            e.printStackTrace();
        }
    }

    /**
     * 将一个可序列化的对象保存到缓存对象中
     */
    public void put(String name, Serializable obj) {
        Element ele = new Element(name, obj);
        cache.putQuiet(ele);
    }

    /**
     * 得到已经保存的缓存对象的实例
     */
    public Object get(String name) {
        try {
            Element ele = cache.get(name);
            if (ele == null)
                return null;

            return ele.getValue();
        } catch (IllegalStateException e) {
            e.printStackTrace();
        } catch (CacheException e) {
            e.printStackTrace();
        }
        return null;
    }

    /**
     * 清除已经保存到缓存中的实例对象
     */
    public void clear(String name) {
        cache.remove(name);
    }

    /**
     * 清除所有的已经保存的缓存对象的实例
     */
    public void clearAll() {
        try {
            cache.removeAll();
        } catch (IllegalStateException e) {
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}
