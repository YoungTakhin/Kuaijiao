<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller {
	
    //
    public function haha() {
    	$data = 'hello';
    	return view('demo')->with('user', $data);
    }

}
