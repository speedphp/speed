<?php
class MainController extends BaseController
{
	// 首页
	function actionIndex(){
		// 连个hello world都木有？
		
		// 回答：页面自动输出，请看default_index.html
	}
	
	// 接收提交表单
	function actionReceive(){
		// dump($_POST); 
		// 把提交的数据先dump出来看看是良好的习惯。
		
		if(isset($_POST["username"])){
			echo "已经提交了".$_POST["username"];
		}else{
			echo "没有填东东呢";
		}
	}
}