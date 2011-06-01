1、安装:hustoj_source
2、安装:moodle_source
3、保持hustoj_source和moodle_source两个站点在同一个域名之下（同域下才能进行通信）
	比如，	hustoj_source在acm.zjicm.org
		moodle_source在moole2.0.zjicm.org
		这样，大家就都在zjicm.org这个共同的域名下面了
4、修改hustoj_source下面的ajax_bridge.html文件，将其中的
	document.domain="****"，修改为共同的域名
	url:"http://***",修改为hustoj_source域名，并指向ajax.php文件
5、修改moodle_source目录下/mod/assignment/type/hustoj/assignment.class.php文件
	将其中的<iframe id="ajax-bridge" name="ajax-bridge" style="display:none" src="http://acm.zjicm.org/ajax_bridge.html"></iframe>
	中的src属性内的域名改为hustoj_source的域名
6、这样二者就可以实现通信，在moodle中无缝实现online judge功能了