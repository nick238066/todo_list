<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //test echo
    function main(){
    	echo 'abcdefg';
    	return view('main');
    }
}
