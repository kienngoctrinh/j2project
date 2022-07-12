<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcademicYear\StoreRequest;
use App\Http\Requests\AcademicYear\UpdateRequest;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AcademicYearController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = AcademicYear::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('academicyear.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('academicyear.create');
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('academicyears.index');
    }

    public function edit(AcademicYear $academicyear)
    {
        return view('academicyear.edit', [
           'each' => $academicyear,
        ]);
    }

    public function update(UpdateRequest $request, $academicyearId)
    {
        $object = $this->model->find($academicyearId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('academicyears.index');
    }

    public function destroy(AcademicYear $academicyear)
    {
        $academicyear->delete();

        return redirect()->route('academicyears.index');
    }
}
