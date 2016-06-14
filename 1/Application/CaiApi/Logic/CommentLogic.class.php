<?php
namespace CaiApi\Logic;

class CommentLogic extends BasicLogic{

	private $commentModel;

	function __construct(){
		$this->commentModel = D('comment');
	}

	function getCommentByFoodIdAndPage($pageSize,$pageNum,$foodId){
		//分页查案评论
		$result = array();
		if($pageSize&&$pageNum&&$foodId){
			$data = $this->commentModel->where("foodId = '$foodId'")->page("$pageNum,$pageSize")->order('id desc')->select();
			if($data != null){
				$userModel = D('user');
				for($i=0;$i<count($data);$i++){
					$comment = $data[$i];
					$userId = $comment["userid"];
					$user = $userModel->where("id = '$userId'")->find();
					$trueName = $user["truename"];
					$userImg = $user["userimg"];
					$data[$i]["truename"] = $trueName;
					$data[$i]["userimg"] = $userImg;
				}
				$result['code'] = "200";
				$result['msg'] = "success";
				$result['list'] = $data;
			}else{
				$result['code'] = "201";
				$result['msg'] = "error";
			}
		}else{
			$result['code'] = "202";
			$result['msg'] = "error";
		}
		
		echo json_encode($result);
	}

	function addComment($userId,$foodId,$content,$time){
		//增加评论
		$data = array();
		if($userId&&$foodId&&$content&&$time){
			$data['userid'] = $userId;
			$data['foodid'] = $foodId;
			$data['content']= $content;
			$data['time'] = $time;
			$result = array();
			$result['id'] = $this->commentModel->add($data);
			if($result['id'] != null){
				$result['code'] = "200";
				$result['msg'] = "success";
			}else{
				$result['code'] = "201";
				$result['msg'] = "error";
			}
		}else{
			$result['code'] = "202";
			$result['msg'] = "error";
		}
		echo json_encode($result);
	}

	function getConversations($userId){
		//获取用户最近的评论
		$result = array();
		if($userId){
			$foodModel = D('food');
			$foodIdArray = array();
			$foodOfUser = $foodModel->where("userid = '$userId'")->select();
			for($i=0;$i<count($foodOfUser);$i++){
				$food = $foodOfUser[$i];
				$foodIdArray[$i] = $food['id'];
			}
			$map['foodid'] = array('IN',$foodIdArray);
			$data = $this->commentModel->where($map)->order("id")->select();
			if($data != null){
				$userModel = D('user');
				for($i=0;$i<count($data);$i++){
					$comment = $data[$i];
					$userId = $comment["userid"];
					$user = $userModel->where("id = '$userId'")->find();
					$trueName = $user["truename"];
					$userImg = $user["userimg"];
					$data[$i]["truename"] = $trueName;
					$data[$i]["userimg"] = $userImg;
				}
				$result['code'] = "200";
				$result['msg'] = "success";
				$result['list'] = $data;	
			}else{
				$result['code'] = "202";
				$result['msg'] = "error";	
			}
		}else{
			$result['code'] = "201";
			$result['msg'] = "error";
		}
		echo json_encode($result);

	}
}

?>