<?php
class OtherController extends BaseController
{
	// 这里先构造点数据
	var $fakedata = array(
		"title" => "静夜思",
		"code"  => array(
			"one"   => "床前明月光",
			"two"   => "疑是地上霜",
			"three" => "举头望明月",
			"four"  => "低头思故乡"
		),
		"author"   => "李白"
	);
	// 默认入口
	function actionIndex(){
		echo "这里是OtherController/actionIndex，";
		$backurl = url("main", "index");
		echo "请返回<a href='$backurl'>MainController/actionIndex</a>";
	}
	
	// 显示JSON格式的数据，其实只是显示不一样而已
	function actionJson(){
		echo json_encode($this->fakedata);
	}
	
	// 接收提交参数，这里是GET方式的，直接用PHP的$_GET来接收
	function actionVal(){
		// 用$this->的方法将值传递到模板中使用
		$this->whoami = $_GET["whoami"];
		// 下面是模板输出了，模板输出可以用display方法
		$this->display("custom_page.html");
	}
	
	// 模板显示，foreach循环，多维数据的演示
	function actionTpl(){
		$this->data = $this->fakedata;
		// 这里模板输出就是不用display方法，因为模板名字是other_tpl.html(控制器名_方法名.html)
	}
	
	// 演示dump函数，这是最常用的工具哦
	function actionDump(){
		echo "演示dump函数，这是最常用的工具哦";
		
		dump($this->fakedata);
		dump($_POST); // 在提交表单的时候，先看看提交上来是什么
		dump($_GET);
		
		$backurl = url("main", "index");
		echo "请返回<a href='$backurl'>MainController/actionIndex</a>";
	}
}