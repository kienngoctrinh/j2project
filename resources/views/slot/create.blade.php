@extends('layout.master')
@section('content')
    <form action="{{ route('slots.store') }}" method="post">
        @csrf
        Slot
        <select name="slot">
            @foreach($slots as $slot => $value)
                <option value="{{ $value }}">
                    {{ $slot }}
                </option>
            @endforeach
        </select>
        <br>
        Teacher
        <select name="teacher_id">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        <br>
        Subject
        <select name="subject_id">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        <br>
        Class
        <select name="classs_id">
            @foreach($classses as $classs)
                <option value="{{ $classs->id }}" {{ old('classs_id') == $classs->id ? 'selected' : '' }}>
                    {{ $classs->name }}
                </option>
            @endforeach
        </select>
        <br>
        Date
        <input type="date" name="date">
        <br>
        <button>Create</button>
    </form>
@endsection