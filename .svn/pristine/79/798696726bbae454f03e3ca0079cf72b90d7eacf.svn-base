<?php
namespace CaiApi\Logic;
header("Content-type: text/javascript; charset=utf-8");
class RegisterLogic extends BasicLogic{
    //注册的业务逻辑类

    function visitorRegister($deviceClass){
        //游客注册逻辑
        $visitor = D('visitor');
        $visitorName = "游客".rand(100000,999999);
        $data['visitorname']=$visitorName;
        $data['deviceclass']=$deviceClass;
        $response = $visitor->add($data);
        $visitorData = $visitor->where("visitorid=$response")->find(); 
        echo json_encode($visitorData);//将注册的游客信息以json的形式返回

    }
    function customerRegister($customerName,$deviceClass,$password){
        //用户注册逻辑层
        $customer = D('customer');
        $data['customername']=$customerName;
        $data['deviceclass']=$deviceClass;
        $data['password']=$password;
        $response = $customer->add($data);
        $customerData = $customer->where("customerid=$response")->find();
        echo json_encode($customerData);//将注册的用户信息以json的形式返回
        
    }
}
?>
