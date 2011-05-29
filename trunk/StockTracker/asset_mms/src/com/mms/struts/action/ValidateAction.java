/*
 * Generated by MyEclipse Struts
 * Template path: templates/java/JavaClass.vtl
 */
package com.mms.struts.action;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.image.BufferedImage;
import java.io.IOException;
import java.util.Random;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.struts.action.Action;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionForward;
import org.apache.struts.action.ActionMapping;

import com.sun.image.codec.jpeg.ImageFormatException;
import com.sun.image.codec.jpeg.JPEGCodec;
import com.sun.image.codec.jpeg.JPEGImageEncoder;
/** 
 * MyEclipse Struts
 * Creation date: 11-23-2009
 * 
 * XDoclet definition:
 * @struts.action validate="true"
 */
public class ValidateAction extends Action {
	/*
	 * Generated Methods
	 */

	/** 
	 * Method execute
	 * @param mapping
	 * @param form
	 * @param request
	 * @param response
	 * @return ActionForward
	 */
	public ActionForward execute(ActionMapping mapping, ActionForm form,
			HttpServletRequest request, HttpServletResponse response) {
		int width = 60, height = 20;
		BufferedImage image = new BufferedImage(width, height, BufferedImage.TYPE_INT_RGB);
		Graphics g = image.getGraphics();
		Random random = new Random();        
		g.fillRect(0, 0, width, height);
		g.setColor(getRandColor(200, 250));
		g.setFont(new Font("Times New Roman", Font.PLAIN, 18));
		g.setColor(getRandColor(160, 200));
		for (int i = 0; i < 155; i++) {
		    int x = random.nextInt(width);
		    int y = random.nextInt(height);
		    int xl = random.nextInt(12);
		    int yl = random.nextInt(12);
		    g.drawLine(x, y, x + xl, y + yl);
		}
		
		String sRand="";
		for (int i = 0; i < 4; i++) {
		    String rand = String.valueOf(random.nextInt(10));
		    sRand += rand;
		    g.setColor(new Color(20 + random.nextInt(110),
		                         20 + random.nextInt(110),
		                         20 + random.nextInt(110)));
		    g.drawString(rand, 13 * i + 6, 16);
		}
		request.getSession().setAttribute("mark", sRand);
		g.dispose();
		JPEGImageEncoder encode;
		try {
			encode = JPEGCodec.createJPEGEncoder(response.getOutputStream());
			encode.encode(image);
		} catch (ImageFormatException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	public Color getRandColor(int fc, int bc) { 
		Random random = new Random();
		if (fc > 255) {
		    fc = 255;
		}
		if (bc > 255) {
		    bc = 255;
		}
		int r = fc + random.nextInt(bc - fc);
		int g = fc + random.nextInt(bc - fc);
		int b = fc + random.nextInt(bc - fc);
		return new Color(r, g, b);
	}
}