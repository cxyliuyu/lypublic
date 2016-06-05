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

    function index(){
    	echo "index";
    }
}