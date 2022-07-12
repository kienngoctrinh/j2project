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
                            <select name="academicYear_id" class="form-control">
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
                            <select name="major_id" class="form-control">
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
                <div class="card-body">
                    @isset($students)
                        <h1 class="page-title">Điểm danh sinh viên</h1>
                        <form method="post" id="form-attendance">
                            <input type="hidden" name="course_id" value={{ $courseId }}>
                            <input type="hidden" name="subject_id" value="{{ $subjectId }}">
                            @csrf
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên sinh viên</th>
                                    <th>Tình trạng đi học</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            @foreach ($attendanceStatuses as $attendanceStatus => $value)
                                                <div class="custom-control-inline">
                                                    <label>
                                                        <input type="radio"
                                                               name="statuses[{{ $student->id }}]"
                                                               value="{{ $value }}"
                                                               @if(isset($statuses[$student->id]) && $statuses[$student->id] == $value)
                                                                   checked
                                                               @endif
                                                        >
                                                        {{ $attendanceStatus }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label>Ngày</label>
                                <input readonly type="date" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ca học</label>
                                <select name="slot" class="form-control">
                                    @foreach($slots as $slot => $value)
                                        <option value="{{ $value }}">
                                            {{ $slot }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên giáo viên</label>
                                <select name="teacher_id" class="form-control">
                                    @foreach ($teachers as $teacher)
                                        <option
                                                value="{{ $teacher->id }}"
                                                @if (isset($teacherId) && $teacherId == $teacher->id)
                                                    selected
                                                @endif
                                        >
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="button" id="btn-attendance">Điểm danh</button>
                            </div>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#btn-attendance').on('click', function(){
           $.ajax({
               type: 'POST',
               url: '{{ route('attendances.attendance') }}',
               data: $('#form-attendance').serialize(),
               success: function(){
                   $.toast({
                       heading: 'Thành công',
                       text: 'Điểm danh thành công',
                       icon: 'success',
                       loader: true,
                       position: 'bottom-right',
                   })
               },
               error: function(){
                   $.toast({
                       heading: 'Thất bại',
                       text: 'Điểm danh thất bại',
                       icon: 'error',
                       loader: true,
                       position: 'bottom-right',
                   })
               },
           });
        });
    </script>
@endpush
