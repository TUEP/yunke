<?php 

namespace app\admin\controller;

use \think\Controller;
use think\Db;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

/**
 * 
 */
class Homephoto extends Permissions
{
	
	public function homephoto()
	{
		return view('index');
	}
}