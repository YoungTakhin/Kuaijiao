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
    	$stat = 111;
    	return view('login')->with('stat', $stat);
    }

    public function user() {
    	session_start();
    	$id = $_SESSION['id'];
    	$username = $_SESSION['username'];
    	$user_type = $_SESSION['$user_type'];
        $user = array('id' => $id, 'username' => $username, 'user_type' => $user_type);
    	if($user_type == 'o') {
            return view('operation')->with('user', $user);
        }
        else if($user_type == 't') {
            return view('teacher')->with('user', $user);
        }
        else {
            return view('student')->with('user', $user);
        }
    	//view('operation')->with('username', $username);
    	//return view('operation')->with('id', $id);
    }
}
