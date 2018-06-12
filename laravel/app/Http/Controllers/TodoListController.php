<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;

class TodoListController extends Controller
{

	protected $post;

	public function __construct(Post $post){
		$this->post = $post;
		//dd($this->post);
	}


    //全部
    function main(){
        $data = array();
        $data['navbar_type']="index";
        //取得待處理資料
        $post = new post;
        $data['post'] = $post->get();
        $data['post']->map(function($post){
            //解析url
            $post->content=urldecode($post->content);
            // $a = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod";
            $post->content_min=str_limit($post->content,50,'...');
            // $post->content=str_limit($a,50,'...');
        });
        //dd($data);
    	return view('main.index',$data);
    }

    //已完成
    function done(){
        $data = array();
        $data['navbar_type']="done";
        //取得待處理資料
        $post = new post;
        $data['post'] = $post->where('status','=',2)->get();
        $data['post']->map(function($post){
            //解析url
            $post->content=urldecode($post->content);
            // $a = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod";
            $post->content_min=str_limit($post->content,50,'...');
            // $post->content=str_limit($a,50,'...');
        });
        //dd($data);
    	return view('main.done',$data);
    }

    //處理中
    function processing(){
        $data = array();
        $data['navbar_type']="processing";
        //取得待處理資料
        $post = new post;
        $data['post'] = $post->where('status','=',1)->get();
        $data['post']->map(function($post){
            //解析url
            $post->content=urldecode($post->content);
            // $a = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod";
            $post->content_min=str_limit($post->content,50,'...');
            // $post->content=str_limit($a,50,'...');
        });
        //dd($data);
		return view('main.processing',$data);
    }

    //待處理
    function process(){
    	$data = array();
    	$data['navbar_type']="process";
    	//取得待處理資料
    	$post = new post;
    	$data['post'] = $post->where('status','=',0)->get();
    	$data['post']->map(function($post){
    		//解析url
    		$post->content=urldecode($post->content);
    		// $a = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod";
    		$post->content_min=str_limit($post->content,50,'...');
    		// $post->content=str_limit($a,50,'...');
    	});
    	//dd($data);
		return view('main.process',$data);
    }

    //已刪除
    function delete(){
        $data = array();
        $data['navbar_type']="delete";
        //取得待處理資料
        $post = new post;
        $data['post'] = $post->where('status','=',9)->get();
        $data['post']->map(function($post){
            //解析url
            $post->content=urldecode($post->content);
            // $a = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod";
            $post->content_min=str_limit($post->content,50,'...');
            // $post->content=str_limit($a,50,'...');
        });
        //dd($data);
		return view('main.delete',$data);
    }

    //新增事項
    function add(){
    	$data = array();
        $data['navbar_type']="add";
		return view('main.add',$data);
    }

    //新增事項-action
    function add_action(Request $request){

    	$post = new post;
    	$post->write_name=$request->form_name;
    	$post->finish_time=$request->form_finish_time;
    	$post->content=urlencode($request->form_content); //轉url編碼
    	$post->remark=$request->form_remark;
    	$post->save();

    	// return redirect()->back();
    	return redirect()->route('main.process');	//新增完成後導回Process
    }

    //更新事項-action
    function update_action(Request $request){
    	//dd($request);

    	$post = post::find($request->data_id);
    	$post->finish_time=$request->form_finish_time;
    	$post->content=urlencode($request->form_content);	//轉url編碼
        $post->remark=$request->form_remark;
    	$post->status=$request->status;
		$post->save();

    	// return redirect()->back();
    	return redirect()->route('main.process');	//更新完成後導回Process
    }
}
