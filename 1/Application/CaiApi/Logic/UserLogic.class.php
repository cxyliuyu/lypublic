<?php
namespace CaiApi\Logic;

class UserLogic extends BasicLogic{

	private $userModel;

	function __construct(){
		$this->userModel = D('user');
	}

	function login($username,$password,$value){
		//登录
		if($username&&$password&&$value){
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
		}else{
			$result['code'] = "202";
			$result['msg'] = "error";
		}
		echo json_encode($result);
	}

	function register($username,$password1,$password2,$truename){
		$result = array();
		if($username&&$password1&&$password2&&$truename){
			if(ereg("^[0-9a-zA-Z\_]*$",$username.$password1.$password2)){
				$user = $this->userModel->where("username = '$username'")->find();
				if($user != null){
					$result['code'] = "204";
					$result['msg'] = "用户名已存在";
				}else{
					if($password1 == $password2){
						$data = array();
						$data['username'] = $username;
						$data['password'] = $password1;
						$data['truename'] = $truename;
						$data['userimg'] = "http://114.215.135.70/lypublic/1/Uploads/2016-06-05/575423b401766.jpg";//默认的一张图片
						$result['id'] = $this->userModel->add($data);
						if($result['id'] != null){
							$result['code'] = "200";
		  					$result['msg'] = "success";
						}else{
							$result['code'] = "203";
		  					$result['msg'] = "error";
						}
					}else{
						$result['code'] = "202";
		  				$result['msg'] = "两次密码必须相同";
					}
				}
			}else{
	  			$result['code'] = "201";
	  			$result['msg'] = "用户名密码只能是字母数字下划线";
			}
		}else{
			$result['code'] = "205";
			$result['msg'] = "不能有数据为空";
		}
		echo json_encode($result);
	}
}

?>