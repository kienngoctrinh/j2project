<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lesson\StoreRequest;
use App\Http\Requests\Lesson\UpdateRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class LessonController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Lesson::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('lesson.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $subjects = Subject::get();

        return view('lesson.create', [
            'subjects' => $subjects,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        $subjects = Subject::get();

        return view('lesson.edit', [
            'each' => $lesson,
            'subjects' => $subjects,
        ]);
    }

    public function update(UpdateRequest $request, $lessonId)
    {
        $object = $this->model->find($lessonId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('lessons.index');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index');
    }
}
