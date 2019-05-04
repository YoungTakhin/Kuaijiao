<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {
	
    //对象转数组
    private function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    //学生端已选课程
    public function selectCourse() {
        session_start();
        $id = $_SESSION['id'];
        $result = DB::table('student_course')
            ->join('students', function ($join) {
                $join->on('students.id', '=', 'student_course.studentid');
            })
            ->join('courses', function ($join) use ($id) {
                $join->on('courses.courseid', '=', 'student_course.courseid')
                    ->where('studentid', 'LIKE', $id);
            })
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $course = array('row_num' => $row_num, 'row' => $result);
        return view('/student/selectCourse')->with('course', $course);
    }

    //学生端查看作业
    public function selectHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result = DB::table('course_homework')
            ->join('courses', function ($join) {
                $join->on('course_homework.courseid', '=', 'courses.courseid');
            })
            ->join('student_course', function ($join) {
                $join->on('student_course.courseid', '=', 'courses.courseid');
            })
            ->join('homeworks', function ($join) use ($id) {
                $join->on('homeworks.homeworkid', '=', 'course_homework.homeworkid')
                    ->where('studentid', 'LIKE', $id);
            })
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $course = array('row_num' => $row_num, 'row' => $result);
        return view('/student/selectHomework')->with('course', $course);
    }

    //学生端上传作业
    public function uphomework(Request $request) {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        if($_FILES['URL']['error'] != 0) {
            echo "<script>alert('提交失败！');</script>";
            return StudentController::selectHomework();
        }
        else {
            $homeworkid = $_POST['homeworkid'];
            $url = $request->URL->store('');
            try {
                $result = DB::insert('call PUI0301_StuHw_I(?, ?, ?)', [$homeworkid, $id, $url]);
                echo "<script>alert('提交成功！');</script>";
            }
            catch(\Exception $e) {
                echo "<script>alert('提交失败！');</script>";
            }
            finally {
                return StudentController::selectHomework();
            }
        }
    }

    //学生端下载作业附件
    public function downHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $homeworkid = $_GET['homeworkid'];
        $result = DB::table('homeworks')
            ->where('homeworkid', 'LIKE', $homeworkid)
                ->value('URL');
        $result = $this::objectToArray($result);
        $url = $result;
        $path = realpath(base_path('storage\app')) . "\\" . $url;
        return response()->download($path);
    }

    //测试
    public function test() {
        //$test = DB::select('select * from students');
        $test = DB::select('call p_test');
        //$row = DB::row($test);
        var_dump($test);
        //var_dump($row);
    }
}

