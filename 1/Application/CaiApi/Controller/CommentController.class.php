<?php
namespace CaiApi\Controller;
use Think\Controller;
class CommentController extends Controller {
	//评论控制器
	
	private $commentLogic;
	function __construct(){
		$this->commentLogic = D('Comment','Logic');
	}

	function getCommentByFoodIdAndPage(){
		$pageSize = I('request.pageSize');
		$pageNum = I('request.pageNum');
		$foodId = I('request.foodId');
		$this->commentLogic->getCommentByFoodIdAndPage($pageSize,$pageNum,$foodId);
	}

	function addComment(){
		//添加新评论
		$userId = I('request.userId');
		$foodId = I('request.foodId');
		$content = I('request.content');
		echo $content;
		$time = time();
		$this->commentLogic->addComment($userId,$foodId,$content,$time);
	}
	function getConversations(){
		$userId = I('request.userId');
		$this->commentLogic->getConversations($userId);
	}

}
?>