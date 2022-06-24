<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Models\Major;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class TeacherController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Teacher::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('teacher.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $majors = Major::get();

        return view('teacher.create', [
            'majors' => $majors,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        $majors = Major::get();

        return view('teacher.edit', [
            'each' => $teacher,
            'majors' => $majors,
        ]);
    }

    public function update(UpdateRequest $request, $teacherId)
    {
        $object = $this->model->find($teacherId);
        $object->fill($request->except('_token'));
        $object->save();

        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}
