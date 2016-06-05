<?php
namespace CaiApi\Controller;
use Think\Controller;
class FileController extends Controller{
    public function toUpload(){
        $this->display("file");
    }
	public function upload(){
        $result = array();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            // $this->error($upload->getError());
            $result['code'] = "201";
            $result['msg'] = "error";
        }else{// 上传成功
            $url = "";
            foreach($info as $file){
                 $url = $file['savepath'].$file['savename'];
            }
            $result['code'] = "200";
            $result['msg'] = "success";
            $result['url'] = $url;
        }
        echo json_encode($result);
    }
}
?>
