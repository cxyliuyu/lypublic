<?php
//注册控制器
namespace CaiApi\Controller;
use Think\Controller;
header("Content-type: text/javascript; charset=utf-8");
class LoginController extends Controller{
	private $userLogic;
	function __construct(){
        $this->loginLogic = D('User','Logic');        
    }
    function login(){
    	$userName = I("request.userName");
    	$password = I("request.password");
    	$value = I("request.value");
    	$this->loginLogic->login($userName,$password,$value);
    }
}