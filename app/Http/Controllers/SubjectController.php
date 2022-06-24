<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\StoreRequest;
use App\Http\Requests\Subject\UpdateRequest;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Subject::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('subject.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $majors = Major::get();

        return view('subject.create', [
            'majors' => $majors,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('subjects.index');
    }

    public function edit(Subject $subject)
    {
        $majors = Major::get();

        return view('subject.edit', [
            'each' => $subject,
            'majors' => $majors,
        ]);
    }

    public function update(UpdateRequest $request, $subjectId)
    {
        $object = $this->model->find($subjectId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index');
    }
}
