<?php
namespace app\index\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

class About extends Controller
{
	public function index()
	{
		return view('about');
	}
}
