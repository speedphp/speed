<?php

date_default_timezone_set('PRC');


$config = array(
	'rewrite' => array(
		'admin/index.html' => 'admin/main/index',
		'admin/<c>_<a>.html'    => 'admin/<c>/<a>', 
		'<c>/<a>'          => '<c>/<a>',
		'/'                => 'main/index',
	),
);

$domain = array(
	"localhost" => array( // 调试配置
		'debug' => 1,
		'mysql' => array(

				'MYSQL_HOST' => 'localhost',
				'MYSQL_PORT' => '3306',
				'MYSQL_USER' => 'root',
				'MYSQL_DB'   => 'test',
				'MYSQL_PASS' => '',
				'MYSQL_CHARSET' => 'utf8',

		),
	),
	"speedphp.com" => array( //线上配置
		'debug' => 0,
		'mysql' => array(),
	),
);

return $domain[$_SERVER["HTTP_HOST"]] + $config;