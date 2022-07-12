<?php

namespace App\Http\Controllers;

use App\Enums\AttendanceStatusEnum;
use App\Enums\SlotSlotEnum;
use App\Models\AcademicYear;
use App\Models\Attendance;
use App\Models\AttendanceStudent;
use App\Models\Course;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        $statuses = AttendanceStatusEnum::getArrayView();
        $slots = SlotSlotEnum::getArrayView();

        View::share('title', $title);
        View::share('statuses', $statuses);
        View::share('slots', $slots);
    }

    public function get()
    {
        $academicYears = AcademicYear::get();
        $majors = Major::get();
        $courses = Course::get();
        $subjects = Subject::get();

        return view('attendance.index', [
            'academicYears' => $academicYears,
            'majors' => $majors,
            'courses' => $courses,
            'subjects' => $subjects,
        ]);
    }

    public function index(Request $request)
    {
        $academicYears = AcademicYear::get();
        $majors = Major::get();
        $courses = Course::get();
        $subjects = Subject::get();
        $teachers = Teacher::get();

        $academicYearId = $request->get('academicYear_id');
        $majorId = $request->get('major_id');
        $courseId = $request->get('course_id');
        $subjectId = $request->get('subject_id');
        $teacherId = $request->get('teacher_id');

        $students = Student::query()
            ->where('course_id', $courseId)
            ->get();

        // $majors = Major::query()
        //     ->where('academic_year_id', $academicYearId)
        //     ->get();
        //
        // $courses = Course::query()
        //     ->where('major_id', $majorId)
        //     ->get();
        //
        // $subjects = Subject::query()
        //     ->where('major_id', $majorId)
        //     ->get();

        return view('attendance.index', [
            'academicYears' => $academicYears,
            'majors' => $majors,
            'courses' => $courses,
            'subjects' => $subjects,
            'students' => $students,
            'teachers' => $teachers,
            'academicYearId' => $academicYearId,
            'majorId' => $majorId,
            'courseId' => $courseId,
            'subjectId' => $subjectId,
            'teacherId' => $teacherId,
        ]);
    }

    public function attendance(Request $request)
    {
        $courseId = $request->get('course_id');
        $subjectId = $request->get('subject_id');
        $teacherId = $request->get('teacher_id');
        $statuses = $request->get('statuses');
        $slot = $request->get('slot');

        $attendance = Attendance::create([
            'slot' => $slot,
            'teacher_id' => $teacherId,
            'subject_id' => $subjectId,
            'course_id' => $courseId,
            'date' => date('Y-m-d'),
        ]);

        foreach ($statuses as $studentId => $status){
            AttendanceStudent::create([
               'attendance_id' => $attendance->id,
               'student_id' => $studentId,
               'status' => $status,
            ]);
        }

        // return redirect()->route('attendances.index', [
        //     'courseId' => $courseId,
        //     'subjectId' => $subjectId,
        // ]);
    }
}
