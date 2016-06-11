<?php
namespace CaiApi\Controller;
use Think\Controller;
class FoodController extends Controller {

	private $foodLogic;
	function __construct(){
		$this->foodLogic = D('Food','Logic');
	}
	function getFoodsByPage(){
		$pageSize = I('request.pageSize');
		$pageNum = I('request.pageNum');
		$this->foodLogic->getFoodsByPage($pageSize,$pageNum);
	}
	function getFoodById(){
		$id = I('request.id');
		$this->foodLogic->getFoodById($id);
	}
	function searchFood(){
		//查找食物方法
		$key = I('request.key');
		$this->foodLogic->searchFood($key);
	}
	function getFoodsByUserIdAndPage(){
		$userId = I('request.userId');
		$pageSize = I('request.pageSize');
		$pageNum = I('request.pageNum');
		$this->foodLogic->getFoodsByUserIdAndPage($userId,$pageSize,$pageNum);
	}
	function addFood(){
		$foodName = I('request.foodName');
		$foodImg = I('request.foodImg');
		$userId = I('request.userId');
		$content = I('request.content');
		$this->foodLogic->addFood($foodName,$foodImg,$userId,$content);
	}
	function addFoodList(){
		//添加配料
		$foodListName = I('request.foodListName');
		$foodListCount = I('request.foodListCount');
		$foodId = I('request.foodId');
		$this->foodLogic->addFoodList($foodListName,$foodListCount,$foodId);
	}
	function addFoodStep(){
		$stepImg = I('request.stepImg');
		$stepTxt = I('request.stepTxt');
		$stepOrder = I('request.stepOrder');
		$foodId = I('request.foodId');
		$this->foodLogic->addFoodStep($stepImg,$stepTxt,$stepOrder,$foodId);
	}
}

?>