<?php
namespace CaiApi\Logic;

class SaveLogic extends BasicLogic{

	private $saveModel;

	function __construct(){
		$this->saveModel = D('save');
	}
	function getSaveByUserIdAndPage($userId,$pageSize,$pageNum){
		$result = array();
		$data = $this->saveModel->where("userid =$userId")->page("$pageNum,$pageSize")->order('id desc')->select();
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
	function addSave($userId,$foodId){
		$result = array();
		$data = array();
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
		echo json_encode($result);
	}
}
?>