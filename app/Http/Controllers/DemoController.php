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
    	$user_type = $_SESSION['user_type'];
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
    }

    public function selectStudent() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from students");
        $row_num = mysqli_num_rows($result);
        //var_dump($row_num);
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        //var_dump($row);
        $student = array('row_num' => $row_num, 'row' => $row);
        //var_dump($student);
        mysqli_close($conn);
        return view('selectStudent')->with('student', $student);
    }

    public function selectTeacher() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teachers");
        $row_num = mysqli_num_rows($result);
        //var_dump($row_num);
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        //var_dump($row);
        $teacher = array('row_num' => $row_num, 'row' => $row);
        //var_dump($student);
        mysqli_close($conn);
        return view('selectTeacher')->with('teacher', $teacher);
    }

    public function insertStudent() {
        if(!isset($_POST['insertStudent'])) {
            exit('非法访问!');
        }
        $id = $_POST['id'];
        $password = $_POST['password'];
        //包含数据库连接文件
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "insert into students values ()");
        //var_dump($check_query);
        //var_dump(mysqli_fetch_array($check_query));
        if($result = mysqli_fetch_array($check_query)) {
            //var_dump($result);
            //登录成功
            $id = $result['id'];
            $username = $result['username'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = 's';
            echo $username . ',欢迎你！<a href="student">进入主页</a><br />';
            exit;
        }
        else {
            //var_dump($result);
            exit('新增失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
        }
    }
}
