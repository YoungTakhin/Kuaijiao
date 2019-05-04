<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {
	
    //对象转数组
    private function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    //教师端课程查询
    public function selectCourse() {
        session_start();
        $id = $_SESSION['id'];
        $result = DB::table('teacher_course')
            ->join('teachers', function ($join) {
                $join->on('teachers.id', '=', 'teacher_course.teacherid');
            })
            ->join('courses', function ($join) use ($id) {
                $join->on('courses.courseid', '=', 'teacher_course.courseid')
                    ->where('teacherid', 'LIKE', $id);
            })
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $course = array('row_num' => $row_num, 'row' => $result);
        return view('/teacher/selectCourse')->with('course', $course);
    }

    //教师端布置作业
    public function insertHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result = DB::table('teacher_course')
            ->join('teachers', function ($join) {
                $join->on('teachers.id', '=', 'teacher_course.teacherid');
            })
            ->join('courses', function ($join) use ($id) {
                $join->on('courses.courseid', '=', 'teacher_course.courseid')
                    ->where('teacherid', 'LIKE', $id);
            })
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $course = array('row_num' => $row_num, 'row' => $result);
        return view('/teacher/insertHomework')->with('course', $course);
    }

    //教师端上传作业附件
    public function upHomework(Request $request) {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $courseid = $_POST['courseid'];
        $description = $_POST['description'];
        $result = DB::table('teacher_course')
            ->join('teachers', function ($join) {
                $join->on('teachers.id', 'LIKE', 'teacher_course.teacherid');
            })
            ->join('courses', function ($join) use ($id) {
                $join->on('courses.courseid', 'LIKE', 'teacher_course.courseid')
                    ->where('teacherid', 'LIKE', $id);
            });
        $row_num = $result->count();
        $homeworkid = date('Ymdhis');
        if ($request->isMethod('POST')) {
            if($_FILES['URL']['error'] == 0) {
                $url = $request->URL->store('');
            }
            else {
                $url = NULL;
            }
        }
        try {
            $result = DB::insert('call PUI0201_Hw_TecHw_CourHw_I(?, ?, ?, ?, ?)', [$homeworkid, $id, $url, $description, $courseid]);
            echo "<script>alert('布置成功！');</script>";
            $row_num = $result->count();
            $result = $this::objectToArray($result);
            $course = array('row_num' => $row_num, 'row' => $result);
        }
        catch(\Exception $e) {
            echo "<script>alert('布置失败！');</script>";
        }
        finally {
            return TeacherController::insertHomework();
        }
    }

    //教师端查看学生提交作业
    public function selectHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $result = DB::table('student_homework')
            ->join('course_homework', function ($join) {
                $join->on('student_homework.homeworkid', '=', 'course_homework.homeworkid');
            })
            ->join('teacher_homework', function ($join) {
                $join->on('teacher_homework.homeworkid', '=', 'student_homework.homeworkid');
            })
            ->join('courses', function ($join) {
                $join->on('courses.courseid', '=', 'course_homework.courseid');
            })
            ->join('students', function ($join) use ($id) {
                $join->on('students.id', '=', 'student_homework.studentid')
                    ->where('teacher_homework.teacherid', 'LIKE', $id);
            })
            ->get();
        $row_num = $result->count();
        $result = $this::objectToArray($result);
        $homework = array('row_num' => $row_num, 'row' => $result);
        return view('/teacher/selectHomework')->with('homework', $homework);
    }

    //教师端下载学生作业
    public function downHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $homeworkid = $_GET['homeworkid'];
        $result = DB::table('student_homework')
            ->where('homeworkid', 'LIKE', $homeworkid)
            ->get('URL');
        $result = $this::objectToArray($result);
        $url = $result[0]['URL'];
        $path = realpath(base_path('storage\app')) . "\\" . $url;
        return response()->download($path);
    }

    //教师端删除学生作业
    public function deleteHomework() {
        if(isset($_SESSION)) {
            $id = $_SESSION['id'];
        }
        else {
            session_start();
            $id = $_SESSION['id'];
        }
        $homeworkid = $_POST['homeworkid'];
        $studentid = $_POST['studentid'];
        $url = DB::table('student_homework')
            ->where('homeworkid', 'LIKE', $homeworkid)
                ->value('URL');
        Storage::delete($url);
        try {
            $result = DB::delete('call PUI0202_StuHw_D(?, ?)', [$homeworkid, $studentid]);
            echo "<script>alert('删除成功！');</script>";
        }
        catch(\Exception $e) {
            echo "<script>alert('删除失败！');</script>";
        }
        finally {
            return TeacherController::selectHomework();
        }
    }
}
