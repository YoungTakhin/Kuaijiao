<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //对象转数组
    private function objectToArray($object) {
        return json_decode(json_encode($object), true);
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
        $result = DB::table('students')
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $row[0] = NULL;
        $student = array('row_num' => $row_num, 'row' => $result);
        return view('/operation/selectStudent')->with('student', $student);
    }

    //运维端教师查询
    public function selectTeacher() {
        $result = DB::table('teachers')
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $row[0] = NULL;
        $teacher = array('row_num' => $row_num, 'row' => $result);
        return view('/operation/selectTeacher')->with('teacher', $teacher);
    }

    //运维端课程查询
    public function selectCourse() {
        $result = DB::table('courses')
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $row[0] = NULL;
        $course = array('row_num' => $row_num, 'row' => $result);
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

        try {
            $result = DB::insert('call PUI0103_Stu_I(?, ?, ?, ?, ?)', [$id, $username, $major, $email, $password]);
            echo "<script>alert('新增成功！');</script>";
        }
        catch(\Exception $e) {
            echo "<script>alert('新增失败！');</script>";
        }
        finally{
            return view('/operation/insertStudent');
        }
    }

    //运维端选课查询
    public function studentCourse() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result1 = DB::table('courses')
            ->get();
        $row_num1 = $result1->count();
        $result1 = $this::objectToArray($result1);
        $course = array('row_num1' => $row_num1, 'row1' => $result1);
        $result2 = DB::table('students')
            ->get();
        $row_num2 = $result2->count();
        $result2 = $this::objectToArray($result2);
        $student = array('row_num2' => $row_num2, 'row2' => $result2);
        $studentCourse = array($student, $course);
        return view('/operation/studentCourse')->with('studentCourse', $studentCourse);
    }

    //运维端学生选课
    public function insertStudentCourse() {
        if(!isset($_POST['insertStudentCourse'])) {
            exit('非法访问!');
        }
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $id = NULL;
        $courseid = NULL;

        $id = $_POST['id'];
        $courseid = $_POST['courseid'];
        try {
            $result = DB::insert('call PUI0301_OP_StuCour_I(?, ?)', [$id, $courseid]);
            echo "<script>alert('选课成功！');</script>";
        }
        catch(\Exception $e) {
            echo "<script>alert('选课失败！');</script>";
        }
        finally{
            return DemoController::studentCourse();
        }
    }

    //运维端查询学生课程
    public function selectStudentCourse() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result = DB::table('student_course')
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $studentCourse = array('row_num' => $row_num, 'row' => $result);
        return view('/operation/selectStudentCourse')->with('studentCourse', $studentCourse);
    }

    //学生端删除学生
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

    //学生端新增教师
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
        try {
            $result = DB::insert('call PUI0204_Tec_I(?, ?, ?, ?)', [$id, $username, $email, $password]);
            echo "<script>alert('新增成功！');</script>";
        }
        catch(\Exception $e) {
            echo "<script>alert('新增失败！');</script>";
        }
        finally {
            return view('/operation/insertTeacher');
        }
    }

    //学生端删除教师
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

    public function teacherCourse() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result1 = DB::table('courses')
            ->get();
        $row_num1 = $result1->count();
        $result1 = $this::objectToArray($result1);
        $course = array('row_num1' => $row_num1, 'row1' => $result1);
        $result2 = DB::table('teachers')
            ->get();
        $row_num2 = $result2->count();
        $result2 = $this::objectToArray($result2);
        $teacher = array('row_num2' => $row_num2, 'row2' => $result2);
        $teacherCourse = array($teacher, $course);
        return view('/operation/teacherCourse')->with('teacherCourse', $teacherCourse);
    }

    //运维端教师选课
    public function insertTeacherCourse() {
        if(!isset($_POST['insertTeacherCourse'])) {
            exit('非法访问!');
        }
        $id = NULL;
        $courseid = NULL;

        $id = $_POST['id'];
        $courseid = $_POST['courseid'];

        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "insert into teacher_course values ('" . $id . "', '" . $courseid . "')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('授课成功！');</script>";
            return DemoController::teacherCourse();
        }
        else {
            echo "<script>alert('授课失败！');</script>";
            return DemoController::teacherCourse();
        }
    }
}
