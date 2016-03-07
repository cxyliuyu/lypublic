<?php
namespace CaiApi\Logic;

class UserLogic extends BasicLogic{

	private $userModel;

	function __construct(){
		$this->userModel = D('user');
	}

	function login($username,$password,$value){
		//登录
		$key = C("key");
		$allkey = $username.$password.$key;
		$allValue = md5($allkey);

		$result = array();
		if($allValue == $value){
			//通过校验，是合法请求
			$data = $this->userModel->where("username = '$username' AND password = '$password'")->find();
			if($data == null||$data==""){
				$result["code"] = "201";
				$result["msg"] = "NOUSER";
			}else{
				$result["code"] = "200";
				$result["msg"] = "OK";
				$result["data"] = $data;
			}
		}else{
			//未通过校验，非法请求
			$result["code"] = "202";
			$result["msg"] = "Illegal Request";
		}
		echo json_encode($result);

	}
}