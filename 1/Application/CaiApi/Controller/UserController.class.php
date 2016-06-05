<?php
namespace CaiApi\Controller;
use Think\Controller;
class UserController extends Controller{
	private $userLogic;
	
	function __construct(){
        $this->userLogic = D('User','Logic');        
    }

    function login(){
    	$userName = I("request.username");
    	$password = I("request.password");
    	$value = I("request.value");
    	$this->userLogic->login($userName,$password,$value);
    }

    function register(){
        //注册方法
        $username = I('request.username');
        $password1 = I('request.password1');
        $password2 = I('request.password2');
        $truename = I('request.truename');
        $this->userLogic->register($username,$password1,$password2,$truename);
    }
    function index(){
    	echo "index";
    }
}