<?php

namespace App\Http\Controllers;

use App\Enums\AttendanceStatusEnum;
use App\Models\Attendance;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AttendanceController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Attendance::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $courses = Course::get();
        $majors = Major::get();
        $classses = Classs::get();
        $subjects = Subject::get();

        return view('attendance.index', [
            'courses' => $courses,
            'majors' => $majors,
            'classses' => $classses,
            'subjects' => $subjects,
        ]);
    }

    public function attendance(Attendance $attendance)
    {
        $status = AttendanceStatusEnum::asArray();

        $students = Student::get();

        return view('attendance.attendance', [
            'status' => $status,

            'each' => $attendance,
            'students' => $students,
        ]);
    }
}
