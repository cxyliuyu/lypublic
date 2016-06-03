<?php
namespace CaiApi\Logic;

class SaveLogic extends BasicLogic{

	private $saveModel;

	function __construct(){
		$this->saveModel = D('save');
	}
	function getSaveByUserIdAndPage($userId,$pageSize,$pageNum){
		$foodModel = D('food');
		$result = array();
		$foodArray = array();
		if($userId&&$pageSize&&$pageNum){
			$data = $this->saveModel->where("userid =$userId")->page("$pageNum,$pageSize")->order('id desc')->select();
			if($data != null){
				for($i=0;$i<count($data);$i++){
					$foodid = $data[$i]["foodid"];
					$food = $foodModel->where("id = $foodid")->find();
					$foodArray[] = $food;
				}
				$result['code'] = "200";
				$result['msg'] = "success";
				$result['list'] = $foodArray;

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
	function addSave($userId,$foodId){
		//增加收藏
		$result = array();
		$data = array();
		if($userId&&$foodId){
			$data['userid'] = $userId;
			$data['foodid'] = $foodId;
			$result['id'] = $this->saveModel->add($data);
			if($result != null){
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

	function isSaved($userId,$foodId){
		//查询是否收藏
		$result = array();
		if($userId&&$foodId){
			$data = $this->saveModel->where("userid = $userId AND foodid = $foodId")->select();
			if($data != null){
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
	function deleteSave($userId,$foodId){
		//删除收藏
		$result = array();
		if($userId&&$foodId){
			$data = $this->saveModel->where("userid = $userId AND foodid = $foodId")->delete();
			if($data != null){
				$result['code'] = "200";
				$result['msg'] = "success";
				$result['count'] = $data;
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
}
?>