@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal" action="{{ route('attendances.attendance') }}" method="post">
                        @csrf
                        <div class="form-group col-3">
                            <label>Date</label>
                            <input type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label>Course</label>
                            <select name="course_id" class="form-control">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label>Major</label>
                            <select name="major_id" class="form-control">
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label>Class</label>
                            <select name="classs_id" class="form-control">
                                @foreach($classses as $classs)
                                    <option value="{{ $classs->id }}" {{ old('classs_id') == $classs->id ? 'selected' : '' }}>
                                        {{ $classs->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label>Subject</label>
                            <select name="subject_id" class="form-control">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <button class="btn btn-primary">Get</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
