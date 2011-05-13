package com.mms.queryfilter;

import java.io.IOException;
import java.util.Iterator;
import java.util.Set;

import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;




import com.mms.pojo.Popedom;
import com.mms.pojo.Role;
import com.mms.pojo.TUser;

public class CheckerFilter implements Filter {

	public void init(FilterConfig fConfig) throws ServletException {
		
		
	}
	public void destroy() {
		// TODO Auto-generated method stub
		
	}

	public void doFilter(ServletRequest request, ServletResponse response,
		FilterChain chain) throws IOException, ServletException {
		HttpServletRequest httpRequest = (HttpServletRequest) request;    //向下造型（强制类型转换）
		HttpServletResponse httpResponse = (HttpServletResponse) response;
		HttpSession session = httpRequest.getSession(false);
		if (session != null && session.getAttribute("passed")!=null) {
			String passed = (String) session.getAttribute("passed");
			if (passed.equals("true")) {				//登录过了,根据权限判断是否进入下一页
				String query = httpRequest.getQueryString();//参数
				StringBuffer requestURL = httpRequest.getRequestURL();//整个url
				if (query != null)
					requestURL.append("?"+query);
				String url =requestURL.toString();//得到请求的url
				if(null!=session.getAttribute("user")){//登录人的信息
					//Cache ehcache = new EHCache();
					//ehcache.initialize(null);//初始化二级缓存
					//TUser user=(TUser) ehcache.get("user"+session.getAttribute("user"));
					//Role role = (Role) ehcache.get("role"+user.getRole().getRoleId());
					TUser user=(TUser) session.getAttribute("user");
					Role role=user.getRole();
					Set<Popedom> pops = role.getPopedoms();
					Iterator<Popedom> it = pops.iterator();
					while(it.hasNext()){
						Popedom p= it.next();
						if(null!=p.getPopedomId()){
							
							boolean b =url.equals(p.getPopedomPath()+p.getPopedomPam());
							if(b){
								httpRequest.getRequestDispatcher("/main/noPop.jsp").forward(httpRequest, httpResponse);

								
								return;
							}
						}
					}
				}
				chain.doFilter(httpRequest, httpResponse);//允许访问
				return;
			} else if (passed.equals("passing")) {      //正在请求登录页面,进入登录Action
				if (new String(httpRequest.getRequestURI()).equals("/asset_mms/action/login.do")) {//如果是对登录的请求则通过
					chain.doFilter(httpRequest, httpResponse);//允许访问
					return;
				}
			}else{}
			
		}
		httpRequest.getRequestDispatcher("/jsp/login.jsp").forward(httpRequest, httpResponse);

		
	}

	

}
