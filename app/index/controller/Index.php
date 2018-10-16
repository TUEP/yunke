<?php
namespace app\index\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

class Index extends Controller
{
    public function index()
    {
    	// return view('login');
    	$data = Db::name('home_banner')->select();
    	$data1= $data[0]['img'];
    	$data2= $data[1]['img'];
    	$data3= $data[2]['img'];
    	$data4= $data[3]['img'];
    	$data5= $data[4]['img'];
    	$data6= $data[5]['img'];

    	$this->assign('img1',$data1);
    	$this->assign('img2',$data2);
    	$this->assign('img3',$data3);
    	$this->assign('img4',$data4);
    	$this->assign('img5',$data5);
    	$this->assign('img6',$data6);

    	return view();
    }

    public function hotel()
    {
    	return view('hotel');
    }
}
