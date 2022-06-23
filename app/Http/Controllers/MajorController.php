<?php

namespace App\Http\Controllers;

use App\Http\Requests\Major\StoreRequest;
use App\Http\Requests\Major\UpdateRequest;
use App\Models\Major;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class MajorController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Major::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('major.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('major.create');
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('majors.index');
    }

    public function edit(Major $major)
    {
        return view('major.edit', [
            'each' => $major,
        ]);
    }

    public function update(UpdateRequest $request, $majorId)
    {
        $object = $this->model->find($majorId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('majors.index');
    }

    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()->route('majors.index');
    }
}
