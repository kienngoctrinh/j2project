@extends('layout.master')
@section('content')
    <form action="{{ route('lessons.store') }}" method="post">
        @csrf
        Number Lesson
        <input type="text" name="number_lesson" value="{{ old('number_lesson') }}">
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
        Teacher
        <select name="teacher_id">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Create</button>
    </form>
@endsection