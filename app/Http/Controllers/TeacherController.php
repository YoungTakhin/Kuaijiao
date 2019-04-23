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

    public function upHomework(Request $request) {
        session_start();
        $id = $_SESSION['id'];
        $request->hasFile('URL');
        var_dump($request->hasFile('URL'));
        if ($request->isMethod('POST')) {
            //显示的属性更多
            $file = $request->file('URL');
            //var_dump($file);
            if ($file->isValid()) { //括号里面的是必须加的哦
                //如果括号里面的不加上的话，下面的方法也无法调用的
 
                //获取文件的扩展名 
                $ext = $file->getClientOriginalExtension();
 
                //获取文件的绝对路径
                $path = $file->getRealPath();
 
                //定义文件名
                $filename = date('Y-m-d-h-i-s').'.'.$ext;
 
                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                $path = $request->URL->store('');
                echo $path;
                exit();
            }
        }
        //return $path;
        /*
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $result = mysqli_query($conn, "select * from teacher_course join teachers on teachers.id = teacher_course.teacherid join courses on courses.courseid = teacher_course.courseid where teacherid like '" . $_SESSION['id'] . "'");
        $row_num = mysqli_num_rows($result);
        $rand = rand(1000000000, 9999999999);
        //$url = pathinfo(


        //$result = mysqli_query($conn, "insert into homeworks valuse (" . $rand . ", NULL, " . $url . ", NULL)");
        for($i = 0; $i < $row_num; $i++) { 
            $row[$i] = mysqli_fetch_assoc($result);
            //$row[$i] = mysqli_fetch_row($result, MYSQLI_ASSOC);
        }
        $course = array('row_num' => $row_num, 'row' => $row);
        echo "<script>alert('布置成功！');</script>";
        return $url;
        */
        //return view('/teacher/insertHomework')->with('course', $course);
    }

    public function selectHomework() {

    }
}
