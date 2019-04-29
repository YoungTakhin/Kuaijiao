<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller {
	
    //测试
    public function haha() {
    	$data = 'hello';
    	return view('demo')->with('user', $data);
    }

    public function login() {
    	$stat = 111;
    	return view('login')->with('stat', $stat);
    }

    //登录
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

    //运维端学生查询
    public function selectStudent() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from students");
        $row_num = mysqli_num_rows($result);
        $row[0] = NULL;
        for($i = 0; $i < $row_num; $i++) {
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $student = array('row_num' => $row_num, 'row' => $row);
        mysqli_close($conn);
        return view('/operation/selectStudent')->with('student', $student);
    }

    //运维端教师查询
    public function selectTeacher() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teachers");
        $row_num = mysqli_num_rows($result);
        $row[0] = NULL;
        for($i = 0; $i < $row_num; $i++) {
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $teacher = array('row_num' => $row_num, 'row' => $row);
        mysqli_close($conn);
        return view('/operation/selectTeacher')->with('teacher', $teacher);
    }

    //运维端课程查询
    public function selectCourse() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from courses");
        $row_num = mysqli_num_rows($result);
        $row[0] = NULL;
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $course = array('row_num' => $row_num, 'row' => $row);
        mysqli_close($conn);
        return view('/operation/selectCourse')->with('course', $course);
    }

    //运维端学生新增
    public function insertStudent() {
        if(!isset($_POST['insertStudent'])) {
            exit('非法访问!');
        }
        $id = NULL;
        $username = NULL;
        $password = NULL;
        $email = 'NULL';
        $major = NULL;

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $major = $_POST['major'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "insert into students values (" . $id . ", '" . $username . "', '" . $major . "', " . $email . ", '" . $password . "', NULL)";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('新增成功！');</script>";
            return view('/operation/insertStudent');
        }
        else {
            echo "<script>alert('新增失败！');</script>";
            return view('/operation/insertStudent');
        }
    }

    public function studentCourse() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "select * from courses";
        $result = mysqli_query($conn, $sql);
        $row_num1 = mysqli_num_rows($result);
        for($i = 0; $i < $row_num1; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $course = array('row_num1' => $row_num1, 'row1' => $row);
        $sql = "select * from students";
        $result = mysqli_query($conn, $sql);
        $row_num2 = mysqli_num_rows($result);
        for($i = 0; $i < $row_num2; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $student = array('row_num2' => $row_num2, 'row2' => $row);
        $studentCourse = array($student, $course);
        return view('/operation/studentCourse')->with('studentCourse', $studentCourse);
    }

    public function insertStudentCourse() {
        if(!isset($_POST['insertStudentCourse'])) {
            exit('非法访问!');
        }
        $id = NULL;
        $courseid = NULL;

        $id = $_POST['id'];
        $courseid = $_POST['courseid'];

        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "insert into student_course values ('" . $id . "', '" . $courseid . "')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('选课成功！');</script>";
            return DemoController::studentCourse();
        }
        else {
            echo "<script>alert('选课失败！');</script>";
            return DemoController::studentCourse();
        }
    }

    public function selectStudentCourse() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "select * from student_course";
        $result = mysqli_query($conn, $sql);
        $row_num = mysqli_num_rows($result);
        $row[0] = NULL;
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
        }
        $studentCourse = array('row_num' => $row_num, 'row' => $row);
        return view('/operation/selectStudentCourse')->with('studentCourse', $studentCourse);
    }

    public function deleteStudent() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $studentid = $_POST['id'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "delete from students where id = '" . $studentid . "'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('删除成功！');</script>";
            return DemoController::selectStudent();
        }
        else {
            echo "<script>alert('删除失败！');</script>";
            return DemoController::selectStudent();
        }
    }

    public function insertTeacher() {
        if(!isset($_POST['insertTeacher'])) {
            exit('非法访问!');
        }
        $id = NULL;
        $username = NULL;
        $password = NULL;
        $email = 'NULL';

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "insert into teachers values (" . $id . ", '" . $username . "', " . $email . ", '" . $password . "', NULL)";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('新增成功！');</script>";
            return view('/operation/insertTeacher');
        }
        else {
            echo "<script>alert('新增失败！');</script>";
            return view('/operation/insertTeacher');
        }
    }

    public function deleteTeacher() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $teacherid = $_POST['id'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "delete from teachers where id = '" . $teacherid . "'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('删除成功！');</script>";
            return DemoController::selectTeacher();
        }
        else {
            echo "<script>alert('删除失败！');</script>";
            return DemoController::selectTeacher();
        }
    }
}
