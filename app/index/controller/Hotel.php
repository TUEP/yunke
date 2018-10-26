<?php
namespace app\index\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

class Hotel extends Controller
{
	public function index()
	{
		$keyword = trim(input('query'));

		$data = Db::name('hotel')
				->where('commit','like',"%$keyword%")
				->paginate('9',false,['query'=>request()->param()]);

		$this->assign('data',$data);

		return view('hotel');
	}
}