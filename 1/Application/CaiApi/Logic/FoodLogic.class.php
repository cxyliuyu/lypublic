<?php
namespace CaiApi\Logic;

class FoodLogic extends BasicLogic{

	private $foodModel;
	private $foodstepsModel;
	private $foodlistModel;

	function __construct(){
		$this->foodModel = D('food');
		$this->foodstepsModel = D('foodsteps');
		$this->foodlistModel = D('foodlist');
	}
	function getFoodsByPage($pageSize,$pageNum){
		$result = array();
		if($pageSize&&$pageNum){
			$data = $this->foodModel->page("$pageNum,$pageSize")->order('id desc')->select();
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
	function getFoodById($id){
		$return = array();
		if($id){
			$food = $this->foodModel->where("id = $id")->find();
			$foodstepsData = $this->foodstepsModel->where("foodid = $id")->order('stepOrder asc')->select();
			$foodlistData = $this->foodlistModel->where("foodid = $id")->select();
			if($food!= null && $foodstepsData!= null &&$foodlistData != null){
				$return['code'] = "200";
				$return['msg'] = "success";
				$return['food'] = $food;
				$return['foodsteps'] = $foodstepsData;
				$return['foodlist'] = $foodlistData;
			}else{
				$return['code'] = "201";
				$return['msg'] = "fail";
			}
		}else{
			$result['code'] = "202";
			$result['msg'] = "error";
		}
		echo json_encode($return);
	}

	function searchFood($key){
		$return = array();
		if($key){
			$where['foodname'] = array('like',"%$key%");
			$data = $this->foodModel->where($where)->limit(10)->select();
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

	function getFoodsByUserIdAndPage($userId,$pageSize,$pageNum){
		$result = array();
		if($userId&&$pageSize&&$pageNum){
			$data = $this->foodModel->where("userid = '$userId'")->page("$pageNum,$pageSize")->order('id desc')->select();
			if($data != null){
				$result['code'] = "200";
				$result['msg'] = "success";
				$result['list'] = $data;
			}else{
				$result['code'] = "202";
				$result['msg'] ="error";
			}
		}else{
			$result['code'] = "201";
			$result['msg'] ="error";
		}
		echo json_encode($result);
	}

	function addFood($foodName,$foodImg,$userId,$content){
		$result = array();
		if($foodName&&$foodImg&&$userId&&$content){
			$data = array();
			$data['foodname'] = $foodName;
			$data['foodimg'] = $foodImg;
			$data['userid'] = $userId;
			$data['content'] = $content;
			$result['id'] = $this->foodModel->add($data);
			if ($result['id'] != null) {
				$result['code'] ="200";
				$result['msg'] ="success";
			}else{
				$result['code'] ="202";
				$result['msg'] ="error";
			}
		}else{
			$result['code'] = "201";
			$result['msg'] ="error";
		}
		echo json_encode($result);
	}

	function addFoodList($foodListName,$foodListCount,$foodId){
		$result = array();
		if($foodListName&&$foodListCount&&$foodId){
			$data = array();
			$data['foodlistname'] = $foodListName;
			$data['foodlistcount'] = $foodListCount;
			$data['foodid'] = $foodId;
			$result['id'] = $this->foodlistModel->add($data);
			if ($result['id'] != null) {
				$result['code'] ="200";
				$result['msg'] ="success";
			}else{
				$result['code'] ="202";
				$result['msg'] ="error";
			}
		}else{
			$result['code'] = "201";
			$result['msg'] ="error";
		}
		echo json_encode($result);
	}

	function addFoodStep($stepImg,$stepTxt,$stepOrder,$foodId){
		$result = array();
		if($stepImg&&$stepTxt&&$stepOrder&&$foodId){
			$data = array();
			$data['stepimg'] = $stepImg;
			$data['steptxt'] = $stepTxt;
			$data['steporder'] = $stepOrder;
			$data['foodid'] = $foodId;
			$result['id'] = $this->foodstepsModel->add($data);
			if ($result['id'] != null) {
				$result['code'] ="200";
				$result['msg'] ="success";
			}else{
				$result['code'] ="202";
				$result['msg'] ="error";
			}
		}else{
			$result['code'] = "201";
			$result['msg'] ="error";
		}
		echo json_encode($result);
	}
}