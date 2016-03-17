<?php
namespace CaiApi\Logic;

class FoodLogic extends BasicLogic{

	private $foodModel;
	function __construct(){
		$this->foodModel = D('food');
	}
	function getFoodsByPage($pageSize,$pageNum){
		$return = array();
		$data = $this->foodModel->page("$pageNum,$pageSize")->order('id desc')->select();
		if($data != null){
			$result['code'] = "200";
			$result['msg'] = "success";
			$result['list'] = $data;
		}else{
			$result['code'] = "201";
			$result['msg'] = "error";
		}
		echo json_encode($return);
	}
}