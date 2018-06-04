<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //全部
    function main(){
    	return view('main.index');
    }

    //已完成
    function done(){
    	return view('main.done');
    }

    //處理中
    function processing(){
		return view('main.processing');
    }

    //待處理
    function process(){
		return view('main.process');
    }

    //已刪除
    function delete(){
		return view('main.delete');
    }

    //新增事項
    function add(Request $request){

		if(isset($request->form_name)&&!empty($request->form_name)){
			echo $request->form_name;
			//exit;
		}


		return view('main.add');
    }
}
