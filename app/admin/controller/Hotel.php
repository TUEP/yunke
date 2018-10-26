<?php
namespace app\admin\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

class Hotel extends Controller
{
    public function index()
    {
    	$data= Db::name('hotel')->paginate('3',false,['query'=>request()->param()]);

    	$this->assign('data',$data);


    	return view();
    }

    public function create()
    {

    		return view('form');
    }

    public function edit()
    {
    	$temp = input();

    	$datali = Db::name('hotel')->find($temp['id']);

    	$this->assign('datali',$datali);

    	return view('form');
    }

    public function save()
    {
    	$file = request()->file('img');
    	$temp = input();

        if($temp['price']<0){
            $this->error('价格格式不正确!!!');
        }

    	$data=[
    		'price'=>$temp['price'],
    		'commit'=>$temp['commit'],
    		'traffic'=>$temp['traffic'],
    		'update_at'=>time(),
    		'create_at'=>time(),
    	];

    	$file_path=ROOT_PATH . 'public' . DS . 'uploads'.DS.'hotel';
    	$data['img'] = up_photo($file,$file_path);

    	if($data['img']==12){
    		echo "<script >alert('上传失败!请重试');</script>";
    		die;
    	}

    	$int=Db::name('hotel')->insert($data);

    	if($int){
            $this->success('成功','admin/Hotel/index');
        }else{
           	$this->error('失败');
        }

    }

    public function update()
    {
    	$file = request()->file('img');
    	$temp = input();

        if($temp['price']<0){
            $this->error('价格格式不正确!!!');
        }

    	$data=[
    		'price'=>$temp['price'],
    		'commit'=>$temp['commit'],
    		'traffic'=>$temp['traffic'],
    		'update_at'=>time(),
    	];

    	$file_path=ROOT_PATH . 'public' . DS . 'uploads'.DS.'hotel';
    	$data['img'] = up_photo($file,$file_path);

    	if($data['img']==12){
    		echo "<script >alert('上传失败!请重试');</script>";
    		die;
    	}

    	$int=Db::name('hotel')->where('id',$temp['id'])->update($data);

    	if($int){
            $this->success('修改成功','admin/Hotel/index');
        }else{
           	$this->error('失败');
        }
    }

    public function delete()
    {
    	$temp = input();

    	$result = Db::name('hotel')->where('id',$temp['id'])->delete();

    	if($result){
    		$this->success('删除成功','admin/Hotel/index');
        }else{
           	$this->error('失败');
        }
    }
}