<?php
namespace CaiApi\Logic;
header("Content-type: text/javascript; charset=utf-8");
class LoginLogic extends Model{

	private $userModel;

	function __construct(){
		$this->userModel = D("User");
	}
	function login($username,$password,$value){
		
	}
}