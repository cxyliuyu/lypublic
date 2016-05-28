<?php
namespace CaiApi\Logic;

class CommentLogic extends BasicLogic{

	private $commentModel;

	function __construct(){
		$this->commentModel = D('comment');
	}

	function getCommentByFoodIdAndPage($pageSize,$pageNum,$foodId){
		$result = array();
		$data = $this->commentModel->where("foodId = $foodId")->page("$pageNum,$pageSize")->order('id desc')->select();
		if($data != null){
			$result['code'] = "200";
			$result['msg'] = "success";
			$result['list'] = $data;
		}else{
			$result['code'] = "201";
			$result['msg'] = "error";
		}
		echo json_encode($result);
	}

	function addComment($userId,$foodId,$content,$time){
		$data = array();
		$data['userid'] = $userId;
		$data['foodid'] = $foodId;
		$data['content']= $content;
		$data['time'] = $time;
		$result = array();
		$result['id'] = $this->commentModel->add($data);
		if($result != null){
			$result['code'] = "200";
			$result['msg'] = "success";
		}else{
			$result['code'] = "201";
			$result['msg'] = "error";
		}
		echo json_encode($result);
	}
}

?>