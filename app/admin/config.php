<?php
// +----------------------------------------------------------------------
// | Tplay [ WE ONLY DO WHAT IS NECESSARY ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tplay.pengyichen.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 听雨 < 389625819@qq.com >
// +----------------------------------------------------------------------


//配置文件
return [
	'view_replace_str' => [
	// 	'__CSS__'      => $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].'/static'.'/admin'.'/css',
		'__CSS__'      =>'/static/admin/css',
		'__PUBLIC__'   =>'/static/public',
		'__JS__'       =>'/static/admin/js'
	],
	// 'view_replace_str'       => ['__PUBLIC__' => $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['SCRIPT_NAME'])),],

	// '__CSS__'=>[
	// 	'blog'=>'/public/static/admin/css'
	// ],



];