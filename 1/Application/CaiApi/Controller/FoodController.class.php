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
}

?>