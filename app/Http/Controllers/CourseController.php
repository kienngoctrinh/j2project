<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\Major;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Course::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('course.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $majors = Major::get();
        $academicyears = AcademicYear::get();

        return view('course.create', [
            'majors' => $majors,
            'academicyears' => $academicyears,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $majors = Major::get();
        $academicyears = AcademicYear::get();

        return view('course.edit', [
            'each' => $course,
            'majors' => $majors,
            'academicyears' => $academicyears,
        ]);
    }

    public function update(UpdateRequest $request, $courseId)
    {
        $object = $this->model->find($courseId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}
