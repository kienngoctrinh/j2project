<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classs\StoreRequest;
use App\Http\Requests\Classs\UpdateRequest;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Major;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ClasssController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Classs::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('classs.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $majors = Major::get();
        $courses = Course::get();

        return view('classs.create', [
            'majors' => $majors,
            'courses' => $courses,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('classses.index');
    }

    public function edit(Classs $classs)
    {
        $majors = Major::get();
        $courses = Course::get();

        return view('classs.edit', [
            'each' => $classs,
            'majors' => $majors,
            'courses' => $courses,
        ]);
    }

    public function update(UpdateRequest $request, $subjectId)
    {
        $object = $this->model->find($subjectId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('classses.index');
    }

    public function destroy(Classs $classs)
    {
        $classs->delete();

        return redirect()->route('classses.index');
    }
}
