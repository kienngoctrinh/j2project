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

        $attendanceStatuses = AttendanceStatusEnum::getArrayView();
        $slots = SlotSlotEnum::getArrayView();

        View::share('title', $title);
        View::share('attendanceStatuses', $attendanceStatuses);
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

        $attendanceId = Attendance::query()
            ->where('date', date('Y-m-d'))
            ->where('course_id', $courseId)
            ->where('subject_id', $subjectId)
            ->value('id');

        $statuses = [];

        if (!empty($attendanceId)){
            $attendances = AttendanceStudent::query()
                ->select([
                    'student_id',
                    'status',
                ])
                ->where('attendance_id', $attendanceId)
                ->get();

            foreach ($attendances as $attendance){
                $statuses[$attendance->student_id] = $attendance->status;
            }
        }

        return view('attendance.attendance', [
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
            'statuses' => $statuses,
        ]);
    }

    public function attendance(Request $request)
    {
        $courseId = $request->get('course_id');
        $subjectId = $request->get('subject_id');
        $teacherId = $request->get('teacher_id');
        $statuses = $request->get('statuses');
        $slot = $request->get('slot');

        $attendance = Attendance::query()
            ->where([
                'slot' => $slot,
                'subject_id' => $subjectId,
                'course_id' => $courseId,
                'date' => date('Y-m-d'),
            ])->first();

        if (is_null($attendance)){
            $attendance = Attendance::query()
                ->create([
                    'slot' => $slot,
                    'teacher_id' => $teacherId,
                    'subject_id' => $subjectId,
                    'course_id' => $courseId,
                    'date' => date('Y-m-d'),
                ]);
        }

        foreach ($statuses as $studentId => $status){
            try {
                AttendanceStudent::query()
                    ->updateOrCreate([
                        'attendance_id' => $attendance->id,
                        'student_id' => $studentId,
                    ], [
                        'status' => $status,
                    ]);
            } catch (\Throwable $e) {

            }
        }
    }
}
