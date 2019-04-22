<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        session_start();
        $id = $_SESSION['id'];
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

    public function upHomework() {
        session_start();
        $id = $_SESSION['id'];
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teacher_course join teachers on teachers.id = teacher_course.teacherid join courses on courses.courseid = teacher_course.courseid where teacherid like '" . $_SESSION['id'] . "'");
        $row_num = mysqli_num_rows($result);
        $rand = rand(1000000000, 9999999999);
        $result = mysqli_query($conn, "insert into homeworks valuse (" . $rand . ", " .  . ")");
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        $course = array('row_num' => $row_num, 'row' => $row);
        echo "<script>alert('布置成功！');</script>";
        return view('/teacher/insertHomework')->with('course', $course);
    }

    public function selectHomework() {

    }
}
