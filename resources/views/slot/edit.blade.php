@extends('layout.master')
@section('content')
    <form action="{{ route('slots.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Slot
        <select name="slot">
            @foreach($slots as $slot => $value)
                <option value="{{ $value }}" {{ ($value == $each->slot) ? 'selected' : '' }}>
                    {{ $slot }}
                </option>
            @endforeach
        </select>
        <br>
        Teacher
        <select name="teacher_id">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ ($teacher->id == $each->teacher_id) ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        <br>
        Subject
        <select name="subject_id">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ ($subject->id == $each->subject_id) ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        <br>
        Class
        <select name="classs_id">
            @foreach($classses as $classs)
                <option value="{{ $classs->id }}" {{ ($classs->id == $each->classs_id) ? 'selected' : '' }}>
                    {{ $classs->name }}
                </option>
            @endforeach
        </select>
        <br>
        Date
        <input type="date" name="date" value="{{ $each->date }}">
        <br>
        <button>Update</button>
    </form>
@endsection