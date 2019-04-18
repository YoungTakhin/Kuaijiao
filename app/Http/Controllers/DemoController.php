<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller {
	
    //
    public function haha() {
    	$data = 'hello';
    	return view('demo')->with('user', $data);
    }

    public function login() {
    	$link = mysqli_connect("localhost", "root", "ydx970516", "kj");
    	mysqli_query($link, "set names gb2312");
    	if(isset($_POST['login'])) {
        	$id = $_POST['id'];
        	$password = $_POST['password'];
    		$check_query = mysqli_query($conn, "select id from users where id like '" . $id . "' and password like '" . $password . "' limit 1");
    		//登陆成功
    		if($result == $check_query) {
    			header("location:../../resources/views/operation.blade.php");
    		}
    	}
    	else{
    		$stat = mysqli_stat($link);
    	}
    	return view('login')->with('stat', $stat);
    }
}
