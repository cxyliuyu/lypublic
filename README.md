#"做饭么"APP 的服务端


	因新浪云突然的涨价，项目迁移到阿里云新主机地址Service = http://114.215.135.70/lypublic/1/index.php
	
	接口如下：
	1.登录
	
	Service + /CaiApi/User/login?username=username&&password=password&&value=value
	用户名username密码password用md5加密后传输，value为username+password+key的字符串md5加密后的值
	2.分页获取菜谱
	service + /CaiApi/Food/getFoodsByPage?pageSize=1&&pageNum=1

	3根据id获取菜谱详情
	service + /CaiApi/Food/getFoodById?id=3

	4查询菜谱
	service + /CaiApi/Food/searchFood?key=豆腐

	5根据菜谱分页获取评论
	service + /CaiApi/Comment/getCommentByfoodIdAndPage?pageSize=5&&pageNum=1&&foodId=3

	6添加新的评论接口
	service + /CaiApi/Comment/addComment?userId=2&&foodId=3&&content=haha

	7根据用户id分页获取收藏
	service + /CaiApi/Save/getSaveByUserIdAndPage?userId=1&&pageSize=5&&pageNum=1
	
	8添加新的收藏
	service + /CaiApi/Save/addSave?userId=1&&foodId=5