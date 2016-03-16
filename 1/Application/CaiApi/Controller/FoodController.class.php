<?php
namespace CaiApi\Controller;
use Think\Controller;
class FoodController extends Controller {
	function getFoodsByPage(){
		$pageSize = I('request.pageSize');
		$pageNum = I('request.pageNum');
	}
}

?>