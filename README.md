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

	9获得某条菜谱是否被收藏
	service + /CaiApi/Save/isSaved?foodId=3&&userId=1

	10上传图片接口
	service + /CaiApi/File/upload

	11注册接口
	service + /CaiApi/User/register?username=161&&password1=1234&&password2=12345&truename=哈哈

	12根据用户id获取菜谱列表
	service + /CaiApi/Food/getFoodsByUserIdAndPage?userId=1&&pageSize=10&&pageNum=1\

	13增加菜谱
	1）增加food表
	Service +/CaiApi/Food/addFood?foodName=%E8%B1%86%E6%B2%99%E7%BB%BF%E8%B1%86%E7%B3%95&&foodImg=http://cp2.douguo.net/upload/caiku/3/9/d/600x400_39876bdcc870d5c26d92059d4813e9ad.jpeg&&userId=3&&content=哈哈哈
	2）增加foodlist(配料)表
	Service +/CaiApi/Food/addFoodList?foodListName=%E7%B3%96&&foodListCount=50g&&foodId=8
	3）增加foodstep(制作步骤)表
	http://localhost/lypublic/1/index.php/CaiApi/Food/addFoodStep?stepImg=http://cp2.douguo.net/upload/caiku/c/e/3/200_ce44383ed861c83b8e059fd3168f6c83.jpeg&&stepTxt=哈哈哈&&stepOrder=1&&foodId=8

	注意，本接口的事务管理在客户端实现

	14根据用户id，获取消息列表
	Service + /CaiApi/Comment/getConversations?userId=1