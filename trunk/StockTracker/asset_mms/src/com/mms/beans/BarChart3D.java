package com.mms.beans;

import java.awt.Color;
import java.awt.Font;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.http.HttpSession;
import org.jfree.chart.ChartFactory;
import org.jfree.chart.ChartRenderingInfo;
import org.jfree.chart.ChartUtilities;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.axis.CategoryAxis;
import org.jfree.chart.axis.NumberAxis;
import org.jfree.chart.entity.StandardEntityCollection;
import org.jfree.chart.plot.CategoryPlot;
import org.jfree.chart.plot.PlotOrientation;
import org.jfree.chart.servlet.ServletUtilities;
import org.jfree.chart.title.TextTitle;
import org.jfree.data.category.CategoryDataset;
import org.jfree.data.category.DefaultCategoryDataset;


public class BarChart3D {

	 private static CategoryDataset createDataset()
	    {
	        String s = "资产名称";
        
	        //创建横坐标的显示内容
	        String s1 = "笔记本";
	        String s2 = "桌椅";
	        String s3 = "讲台";
	        String s4 = "灯管";
	        String s5 = "黑板";
	      
	        //构造生成图片所需要的数据集合
	        DefaultCategoryDataset defaultcategorydataset = new DefaultCategoryDataset();
	        defaultcategorydataset.addValue(28, s, s1);
	        defaultcategorydataset.addValue(60, s, s2);
	        defaultcategorydataset.addValue(12, s, s3);
	        defaultcategorydataset.addValue(57, s, s4);
	        defaultcategorydataset.addValue(34, s, s5);	        
	        return defaultcategorydataset;
	    }
	    //创建JFreeChart对象
	    private static JFreeChart createChart(CategoryDataset categorydataset)
	    {
	        JFreeChart jfreechart = ChartFactory.createBarChart3D("各类资产平均折旧率柱状图", "资产类型", "平均折旧率(%)", categorydataset, PlotOrientation.VERTICAL, true, true, false);
	        jfreechart.setBackgroundPaint(Color.white);
	        CategoryPlot categoryplot = jfreechart.getCategoryPlot();
	        categoryplot.setBackgroundPaint(Color.white);
	        categoryplot.setDomainGridlinePaint(Color.white);
	        categoryplot.setDomainGridlinesVisible(true);
	        categoryplot.setRangeGridlinePaint(Color.blue);
	        
	        
	        TextTitle textTitle = jfreechart.getTitle();
	        textTitle.setFont(new Font("黑体", Font.PLAIN, 20)); //标题字体
	        CategoryAxis categoryaxis=categoryplot.getDomainAxis();
	        NumberAxis numberaxis=(NumberAxis) categoryplot.getRangeAxis();
	        categoryaxis.setTickLabelFont(new Font("sans-serif",Font.PLAIN,11));//设置横坐标文字
	        categoryaxis.setLabelFont(new Font("宋体",Font.PLAIN,12));//设置横坐标标题
	        numberaxis.setTickLabelFont(new Font("sans-serif",Font.PLAIN,11));//设置纵坐标文字
	        numberaxis.setLabelFont(new Font("宋体",Font.PLAIN,12));//设置纵坐标标题文字
	        numberaxis.setStandardTickUnits(NumberAxis.createIntegerTickUnits());
	        return jfreechart;
	    }	 
	    //生成二维柱状图的图片，返回图片文件的名称
	    public static String generateBarChart( HttpSession session, PrintWriter pw) {
			String filename = null;

			CategoryDataset categoryDataset = createDataset();
			JFreeChart chart = createChart(categoryDataset);

			ChartRenderingInfo info = new ChartRenderingInfo(new StandardEntityCollection());
			try {
				filename = ServletUtilities.saveChartAsPNG(chart, 500, 300, info,
						session);
			} catch (IOException e) {
				e.printStackTrace();
			}
			try {
				ChartUtilities.writeImageMap(pw, filename, info, false);
			} catch (IOException e) {
				e.printStackTrace();
			}
			pw.flush();
			return filename;
		}
}
