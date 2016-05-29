<?php
namespace CaiApi\Controller;
use Think\Controller;
class SaveController extends Controller {
	//收藏控制器
	private $saveLogic;
	function __construct(){
		$this->saveLogic = D('Save','Logic');
	}
	function getSaveByUserIdAndPage(){
		$userId = I('request.userId');
		$pageSize = I('request.pageSize');
		$pageNum = I('request.pageNum');
		$this->saveLogic->getSaveByUserIdAndPage($userId,$pageSize,$pageNum);
	}
	function addSave(){
		$userId = I('request.userId');
		$foodId = I('request.foodId');
		$this->saveLogic->addSave($userId,$foodId);
	}
	function isSaved(){
		//查看某菜谱是否保存过
		$userId = I('request.userId');
		$foodId = I('request.foodId');
		$this->saveLogic->isSaved($userId,$foodId);
	}
}
?>