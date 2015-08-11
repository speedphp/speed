<?php
class DbController extends BaseController
{
	// 增加数据create
	function actionCreate(){
		// 准备数据，一个“字段名”对应“值”的数组
		$data = array(
			"username" => "user".mt_rand(2,100),
		);
		
		$user = new User();
		
		// create返回的是最新插入的自增主键的值
		$this->newid = $user->create($data);

		
		$this->findall = $user->findAll();
		$this->display("db/create.html");
	}
	
	// 修改update
	function actionUpdate(){
		$user = new User();
		// 修改uid=2的名字为whoami
		$this->result = $user->update(array(
			"uid" => "2" // 条件
		), array(
			"username" => "whoami" // 修改的内容，键是字段名
		));
		// update返回结果是影响行数，返回0证明查询不到对应条件的数据
		
		$this->findall = $user->findAll();
		$this->display("db/update.html");
	}
	
	// 删除delete
	function actionDelete(){
	    $user = new User();
		// 删除uid为3的行
		$uid = 3;
		// 与insert，update等类似，delete也是输入条件数组
		$this->result = $user->delete(array(
			"uid" => $uid
		));
		// delete也是返回影响行数，没有匹配的结果会返回0
		
		$this->findall = $user->findAll();
		$this->display("db/delete.html");
	}
	
	// 查找findAll/find
	function actionFind(){
		$user = new User();
		// 先查一条，uid为2的
		$this->findone = $user->find(array("uid"=>"2"));
		
		// 查全部，用findAll
		// findAll( $conditions=array(), $order=null, $field='*',  $limit=null )
		// findAll参数：$conditions数组形式的条件（同find），$field指定字段（默认是*），
		// $order是排序（如 “uid DESC”）, $limit是限定条数（如“3,5”，第三条开始取五条）
		$this->findall = $user->findAll();
		
		$this->display("db/find.html");
	}
	
	// SQL查询query
	function actionQuery(){
		$user = new User();
		$uid = 3;
		// 准备SQL，查询uid大于3的
		$sql = "SELECT * FROM test_user WHERE uid > :uid";
		
		// query第一个参数是SQL语句，第二个参数是绑定参数的列表
		$this->findall = $user->query($sql, array(
			":uid" => $uid, // 注意这种绑定参数的做法，可以防止SQL注入
		));
		$this->display("db/query.html");
	}
	
	// SQL执行execute
	function actionExecute(){
		$user = new User();
		$username = "whoami";
		// 准备SQL，要删除username是“whoami”的家伙
		$sql = "DELETE FROM test_user WHERE username = :username";
		
		// 同query，execute第一个参数是SQL语句，第二个参数是绑定参数的列表
		$this->result = $user->execute($sql, array(
				":username" => $username, // 注意这种绑定参数的做法，可以防止SQL注入
		));
		// execute返回参数和create等相同，即是影响行数，为0则证明没有做任何的修改
		
		
		$this->findall = $user->findAll();
		$this->display("db/execute.html");
	}
}