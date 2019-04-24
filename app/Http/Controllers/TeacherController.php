<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;

class TeacherController extends Controller {
	
    //教师端课程查询
    public function selectCourse() {
        session_start();
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teacher_course join teachers on teachers.id = teacher_course.teacherid join courses on courses.courseid = teacher_course.courseid where teacherid like '" . $_SESSION['id'] . "'");
        $row_num = mysqli_num_rows($result);
        //var_dump($row_num);
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        //var_dump($row);
        $course = array('row_num' => $row_num, 'row' => $row);
        //var_dump($course);
        mysqli_close($conn);
        return view('/teacher/selectCourse')->with('course', $course);
    }

    public function insertHomework() {
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
        $result = mysqli_query($conn, "select * from teacher_course join teachers on teachers.id = teacher_course.teacherid join courses on courses.courseid = teacher_course.courseid where teacherid like '" . $_SESSION['id'] . "'");
        $row_num = mysqli_num_rows($result);
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        $course = array('row_num' => $row_num, 'row' => $row);
        return view('/teacher/insertHomework')->with('course', $course);
    }

    public function upHomework(Request $request) {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $courseid = $_POST['courseid'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teacher_course join teachers on teachers.id = teacher_course.teacherid join courses on courses.courseid = teacher_course.courseid where teacherid like '" . $_SESSION['id'] . "'");
        $row_num = mysqli_num_rows($result);
        $homeworkid = date('Ymdhis');
        if ($request->isMethod('POST')) {
            //var_dump($_FILES['URL']);
            if($_FILES['URL']['error'] == 0) {
                $url = $request->URL->store('');
            }
            else {
                $url = NULL;
            }
        }
        $sql = "insert into homeworks values ('" . $homeworkid . "', NULL, '" . $url . "', NULL)";
        //var_dump($sql);
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "insert into teacher_homework values ('" . $homeworkid . "', '" . $id . "')";
            $result = mysqli_query($conn, $sql);
            //var_dump($sql);
            //var_dump($result);
        }
        if ($result) {
            $sql = "insert into course_homework values ('" . $homeworkid . "', '" . $courseid . "')";
            $result = mysqli_query($conn, $sql);
            //var_dump($sql);
            //var_dump($result);
        }
        //var_dump($result);
        $row = NULL;
        $course = array('row_num' => $row_num, 'row' => $row);
        if($result) {
            echo "<script>alert('布置成功！');</script>";
            return TeacherController::insertHomework();
            //return view('/teacher/insertHomework')->with('course', $course);
        }
        else {
            echo "<script>alert('布置失败！');</script>";
            return TeacherController::insertHomework();
            //return view('/teacher/insertHomework')->with('course', $course);
        }
    }

    public function selectHomework() {

    }
}
