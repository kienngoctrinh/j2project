<?php

namespace App\Http\Controllers;

use App\Enums\SlotSlotEnum;
use App\Http\Requests\Slot\StoreRequest;
use App\Http\Requests\Slot\UpdateRequest;
use App\Models\Classs;
use App\Models\Slot;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class SlotController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Slot::query();
        $routeName   = Route::currentRouteName();
        $arr         = explode('.', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->get();
        foreach($data as $each) {
            $each->slot = $each->slot_name;
        }

        return view('slot.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $slots = SlotSlotEnum::asArray();

        $teachers = Teacher::get();
        $subjects = Subject::get();
        $classses = Classs::get();

        return view('slot.create', [
            'slots' => $slots,

            'teachers' => $teachers,
            'subjects' => $subjects,
            'classses' => $classses,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('slots.index');
    }

    public function edit(Slot $slot)
    {
        $slots = SlotSlotEnum::asArray();

        $teachers = Teacher::get();
        $subjects = Subject::get();
        $classses = Classs::get();

        return view('slot.edit', [
            'slots' => $slots,

            'each' => $slot,
            'teachers' => $teachers,
            'subjects' => $subjects,
            'classses' => $classses,
        ]);
    }

    public function update(UpdateRequest $request, $slotId)
    {
        $object = $this->model->find($slotId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('slots.index');
    }

    public function destroy(Slot $slot)
    {
        $slot->delete();

        return redirect()->route('slots.index');
    }
}
