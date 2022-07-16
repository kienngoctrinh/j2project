@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
{{--                    {{ Breadcrumbs::render('about') }}--}}
                    <form class="form-horizontal" method="post">
                        @csrf
                         <div class="form-group">
                            <label>Khoá</label>
                            <select name="academicYear_id" class="form-control" id="select-academic-year">
                                @foreach ($academicYears as $academicYear)
                                    <option
                                            value="{{ $academicYear->id }}"
                                            @if(isset($academicYearId) && $academicYearId == $academicYear->id)
                                                selected
                                            @endif
                                    >
                                        {{ $academicYear->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Chuyên ngành</label>
                            <select name="major_id" class="form-control" id="select-major">
                                @foreach ($majors as $major)
                                    <option
                                            value="{{ $major->id }}"
                                            @if (isset($majorId) && $majorId == $major->id)
                                                selected
                                            @endif
                                    >
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lớp</label>
                            <select name="course_id" class="form-control">
                                @foreach ($courses as $course)
                                    <option
                                            value="{{ $course->id }}"
                                            @if (isset($courseId) && $courseId == $course->id)
                                                selected
                                            @endif
                                    >
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Môn học</label>
                            <select name="subject_id" class="form-control">
                                @foreach ($subjects as $subject)
                                    <option
                                            value="{{ $subject->id }}"
                                            @if (isset($subjectId) && $subjectId == $subject->id)
                                                selected
                                            @endif
                                    >
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Chọn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
    </script>
@endpush