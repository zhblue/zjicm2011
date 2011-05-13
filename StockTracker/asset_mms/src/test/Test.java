package test;

import java.text.NumberFormat;
import java.util.Date;

import junit.framework.TestCase;

import com.mms.util.Utils;

public class Test extends TestCase{
	
	 public static void f()
	 {
		 Date d=Utils.strToDate("2020-11-01");
		 Date dd=Utils.strToDate("2009-10-08");
		 Long kyt = d.getTime()- dd.getTime();
		 System.out.println("test<<<<<<<<<<<<<<<<<"+kyt);
		 Date d1=Utils.strToDate("2009-10-20 13:56:08 ");
		 Date d2=Utils.strToDate("2010-10-21 13:56:14 ");
		 Long ljt = Long.parseLong("0") * 24 * 60 * 60* 1000+(d2.getTime()
					-d1.getTime());
		 System.out.println("test<<<<<<<<<<<<<<<<<"+ljt);
		 Double l = ljt / kyt.doubleValue();
		 System.out.println("<<<<<<"+l);
		 NumberFormat nf = NumberFormat.getPercentInstance();
		 String dep = nf.format(l);
		 System.out.println("test<<<<<<<<<<<<<<<<<"+dep);
	 }
	 
	
}
