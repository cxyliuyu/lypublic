#"做饭么"APP 的服务端

接口如下
	1.登录
	
	http://1.lypublic.sinaapp.com/index.php/CaiApi/User/login?username=username&&password=password&&value=value
	用户名username密码password用md5加密后传输，value为username+password+key的字符串md5加密后的值
