<?php

date_default_timezone_set('PRC');


$config = array(
//	'rewrite' => array(
//		'admin/news.html' => 'admin/main/two',
//		'<m>/<c>/<a>' => '<m>/<c>/<a>',
//		'/' => 'new/main/index',
//	),
);

$domain = array(
	"localhost" => array(
		'debug' => 1,
		'mysql' => array(
			"read" => array(
				'MYSQL_HOST' => 'localhost',
				'MYSQL_PORT' => '3306',
				'MYSQL_USER' => 'root',
				'MYSQL_DB'   => 'test',
				'MYSQL_PASS' => '',
				'MYSQL_CHARSET' => 'utf8',
			),
			"write" => array(
				'MYSQL_HOST' => 'localhost',
				'MYSQL_PORT' => '3306',
				'MYSQL_USER' => 'root',
				'MYSQL_DB'   => 'test',
				'MYSQL_PASS' => '',
				'MYSQL_CHARSET' => 'utf8',
			),
		),
		
		

	),
);

return $domain[$_SERVER["HTTP_HOST"]] + $config;