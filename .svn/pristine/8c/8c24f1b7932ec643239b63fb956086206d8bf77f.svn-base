<?php
//注册控制器
namespace CaiApi\Controller;
use Think\Controller;
header("Content-type: text/javascript; charset=utf-8");
class RegisterController extends Controller{

    private $registerLogic;
    private $hello;
    function __construct(){
        $this->registerLogic = D('Register','Logic');        
    }
    //接收客户端发来的注册请求

    function visitorRegister(){
        //游客注册
        $deviceClass = I("request.deviceClass");//设备类型
        $this->registerLogic->visitorRegister($deviceClass);
    } 

    function customerRegister(){
        $customerName = I("request.customerName");//用户名
        $deviceClass = I("request.deviceClass");//设备类型
        $password = I("request.password");      //密码
        $this->registerLogic->customerRegister($customerName,$deviceClass,$password);
    }

}
?>
