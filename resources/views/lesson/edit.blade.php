@extends('layout.master')
@section('content')
    <form action="{{ route('lessons.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Number Lesson
        <input type="text" name="number_lesson" value="{{ $each->number_lesson }}">
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
        Teacher
        <select name="teacher_id">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ ($teacher->id == $each->teacher_id) ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Update</button>
    </form>
@endsection