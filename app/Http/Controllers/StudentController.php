<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Classs;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Student::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('student.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $classses = Classs::get();

        return view('student.create', [
            'classses' => $classses,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $classses = Classs::get();

        return view('student.edit', [
            'each' => $student,
            'classses' => $classses,
        ]);
    }

    public function update(UpdateRequest $request, $studentId)
    {
        $object = $this->model->find($studentId);
        $object->fill($request->except('_token'));
        $object->save();

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
