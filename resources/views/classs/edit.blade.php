@extends('layout.master')
@section('content')
    <form action="{{ route('classses.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        <br>
        Major
        <select name="major_id">
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ ($major->id == $each->major_id) ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
        <br>
        Course
        <select name="course_id">
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ ($course->id == $each->course_id) ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Update</button>
    </form>
@endsection