@extends('layout.master')
@section('content')
    <form action="{{ route('classses.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        Major
        <select name="major_id">
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
        <br>
        Course
        <select name="course_id">
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Create</button>
    </form>
@endsection