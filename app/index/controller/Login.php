<?php
namespace app\index\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

class Login extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function check()
	{
		$temp = input();

		$data = Db::name('user')->where('name',$temp['l-name'])->where('password',md5($temp['l-pwd']))->find();

		if(isset($data) && !$data==""){ 

			header("Location: http://www.tpyunke.local");exit;
		}else{
			header("Location: http://www.tpyunke.loca/index/login/index");
			exit;
		}
		
	}

	public function create()
	{
		$temp = input();

		$data = [
			'name'=>$temp['r-name'],
			'password'=>md5($temp['r-pwd']),
			'create_at'=>time(),
			'update_at'=>time(),
		];
		// var_dump($data);

		$int = Db::name('user')->insert($data);

		if($int){
			$this->success('注册成功!!','index/login/index');
		}
	}
}