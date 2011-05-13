package com.mms.beans;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.DecimalFormat;
import java.text.NumberFormat;

import javax.servlet.http.HttpSession;
import java.awt.Dimension;
import java.awt.Font;
import javax.swing.JPanel;
import org.jfree.chart.*;
import org.jfree.chart.labels.PieSectionLabelGenerator;
import org.jfree.chart.labels.StandardPieSectionLabelGenerator;
import org.jfree.chart.plot.PiePlot;
import org.jfree.chart.title.TextTitle;
import org.jfree.chart.servlet.ServletUtilities;
import org.jfree.chart.entity.StandardEntityCollection;
import org.jfree.data.*;
import org.jfree.data.general.DefaultPieDataset;
import org.jfree.data.general.PieDataset;
import org.jfree.ui.ApplicationFrame;
import org.jfree.ui.RefineryUtilities;

public class PieChart3D {
    //构造数据集合
	private static PieDataset createDataset() {
		DefaultPieDataset defaultpiedataset = new DefaultPieDataset();
		defaultpiedataset.setValue("工具类", 0.25);
		defaultpiedataset.setValue("数码类", 0.30);
		defaultpiedataset.setValue("视频类", 0.05);
		defaultpiedataset.setValue("食品类", 0.15);
		defaultpiedataset.setValue("不可回收", 0.25);
		return defaultpiedataset;
	}
	//根据数据集合生成JFreeChart对象
	private static JFreeChart createChart(PieDataset piedataset) {
		JFreeChart jfreechart = ChartFactory.createPieChart3D("各种资产类型折旧率比例3D饼状图",	piedataset, true, true, false);
		TextTitle textTitle = jfreechart.getTitle();
        textTitle.setFont(new Font("黑体", Font.PLAIN, 20)); //标题字体
        
        //设置标题栏字体
        jfreechart.getTitle().setFont(new Font("黑体", Font.PLAIN, 20));
        //获得图表显示对象
        PiePlot pieplot = (PiePlot)jfreechart.getPlot();
        //设置图表标签字体
        pieplot.setNoDataMessage("No data available");
        pieplot.setCircular(true);
        //中间图的字体设置
        pieplot.setLabelFont(new Font("sans-serif",Font.PLAIN,11));
        pieplot.setLabelGap(0.01D);//间距
        //最下面说明文字的字体设置
        jfreechart.getLegend().setItemFont(new Font("sans-serif",Font.PLAIN,11));
        
        //设置显示时，饼图数据带上数据的百分比
        //("{0}: ({1}，{2})")是生成的格式，{0}表示section名，{1}表示section的值，{2}表示百分比。
        //而new DecimalFormat("0.00%")表示小数点后保留两位。
        pieplot.setNoDataMessage("无数据可供显示！"); // 没有数据的时候显示的内容
        pieplot.setLabelGenerator(new StandardPieSectionLabelGenerator(("{0}: ({2})"), NumberFormat.getNumberInstance(),new DecimalFormat("0.00%")));

		return jfreechart;
	}
   //生成饼图图形文件
	public static String generatePieChart(HttpSession session, PrintWriter pw) {
		String filename = null;

		PieDataset pieDataset = createDataset();
		JFreeChart chart = createChart(pieDataset);

		chart.setBackgroundPaint(java.awt.Color.white);

		ChartRenderingInfo info = new ChartRenderingInfo(
				new StandardEntityCollection());
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
