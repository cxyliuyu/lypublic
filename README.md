#"做饭么"APP 的服务端


	因新浪云突然的涨价，项目迁移到阿里云新主机地址Service = http://114.215.135.70/lypublic/1/index.php
	
	接口如下：
	1.登录
	
	Service + /CaiApi/User/login?username=username&&password=password&&value=value
	用户名username密码password用md5加密后传输，value为username+password+key的字符串md5加密后的值
	2.分页获取菜谱
	service + /CaiApi/Food/getFoodsByPage?pageSize=1&&pageNum=1