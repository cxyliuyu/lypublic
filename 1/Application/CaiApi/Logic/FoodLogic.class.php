<?php
namespace CaiApi\Logic;

class FoodLogic extends BasicLogic{

	private $foodModel;
	private $foodsteps;
	private $foodlist;

	function __construct(){
		$this->foodModel = D('food');
		$this->foodsteps = D('foodsteps');
		$this->foodlist = D('foodlist');
	}
	function getFoodsByPage($pageSize,$pageNum){
		$result = array();
		$data = $this->foodModel->page("$pageNum,$pageSize")->order('id desc')->select();
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
	function getFoodById($id){
		$return = array();
		$food = $this->foodModel->where("id = $id")->find();
		$foodstepsData = $this->foodsteps->where("foodid = $id")->select();
		$foodlistData = $this->foodlist->where("foodid = $id")->select();
		if($food!= null && $foodstepsData!= null &&$foodlistData != null){
			$return['code'] = "200";
			$return['msg'] = "success";
			$return['food'] = $food;
			$return['foodsteps'] = $foodstepsData;
			$return['foodlist'] = $foodlist;
		}else{
			$return['code'] = "201";
			$return['msg'] = "fail";
		}
		echo json_encode($return);
	}

	function searchFood($key){
		$return = array();
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
		echo json_encode($result);
	}
}