<?php 

namespace app\admin\controller;

use \think\Controller;
use think\Db;
use think\Requset;
use app\admin\controller\Permissions;
use app\admin\model\ArticleCate as cateModel;

/**
 * 
 */
class Homephoto extends Controller
{
	
	public function homephoto()
	{
		$data = Db::name('home_banner')->select();

		$this->assign('data',$data);

		return view('index');
	}

	public function uplode()
	{
		$temp = input();
		$file = request()->file('img');
		
		if($file){
	        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'home_banner');
	        if($info){

		        $path = $info->getSaveName();
		        $data = [
		        	'img'=>$path,
		        	'update_at'=>time()
		        ];

		        $uploads = Db::name('home_banner')->where('id',$temp['id'])->update($data);

		         if($uploads){
            		$this->success('成功','admin/Homephoto/homephoto');
        		}else{
           			$this->error('失败');
        		}

        	}else{
           		// 上传失败获取错误信息
            	$msg = $file->getError();
            	$this->error($msg);
       	 	}
    	}
    
	}
}