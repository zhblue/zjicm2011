package com.mms.util;

import java.text.NumberFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

import com.mms.beans.Dep;
import com.mms.pojo.Asset;
import com.mms.pojo.Borrow;
import com.mms.pojo.Fix;

public class Utils {
	  //字符串类型转换成字符类型
      public static Date strToDate(String s)
      {
  		SimpleDateFormat sdf=new SimpleDateFormat("yyyy-MM-dd");  		
  		Date dt=null;
  		try {
  			dt = sdf.parse(s);
  		} catch (ParseException e) {
  			e.printStackTrace();
  		}
		return dt;

      }
      //日期类型转换成字符串类型
      public static String dateToStr(Date date)
      {
  		SimpleDateFormat sdf=new SimpleDateFormat("yyyy-MM-dd");  		
  		String s=null;
  		s=sdf.format(date);
		return s;

      }
      //计算折旧率
      public static String depCount(Asset asset,Long totaltime) {
  		if (asset.getAssetUseType().equals("0")) 
  		{						
  			Long kyt = asset.getAssetUseToYear().getTime()
  					- asset.getAssetBuyTime().getTime();
  			Double l = totaltime / kyt.doubleValue();
  			NumberFormat nf = NumberFormat.getPercentInstance();
  			String dep = nf.format(l);
  			return dep;
  		} else {
  			//Date date = new Date();

  			Long kyt = asset.getAssetUseToYear().getTime()
  					- asset.getAssetBuyTime().getTime();
  			Double l = totaltime / kyt.doubleValue();
  			NumberFormat nf = NumberFormat.getPercentInstance();
  			String dep = nf.format(l);
  			return dep;
  		}
  	}
      //计算累计时间
      public static Long totalTime(Asset asset,Borrow borrow) {
    		
    			String aut=asset.getAssetUseTime();//累计使用年限
    			Long ljt = (Long.parseLong(aut) * 24 * 60 * 60* 1000 )+(borrow.getBorrowReturnTime().getTime()-
    					borrow.getBorrowBorrowedTime().getTime());
    					 			
    			return ljt;
    		
    	}
     //保存修缮后累计时间
      public static Long totalfixTime(Asset asset,Fix fix) {
  		    //Date date=new Date();
  			String aut=asset.getAssetUseTime();
  			Long ljt = Long.parseLong(aut) * 24 * 60 * 60* 1000+(fix.getFixTimeReturn().getTime()
  					-fix.getFixTimeCheck().getTime());
  			return ljt;
  	}
   //计算资产类型平均折旧率
      public static int avgDep(List<Dep> dep,String type)
      {
    	 int sum=0;
  		 int avg=0;
    	 for(int i=0;i<dep.size();i++)
    	 {
    		Dep d=dep.get(i);
    		if(d.getAssetType().equals(type))
    		{
    			String countdep=d.getDep();
        		Integer countd=Integer.parseInt(countdep);       		
        		sum=sum+countd;
        		avg=sum/i;
    		}   		
    	 }
    	 return avg;
      }  	
}
