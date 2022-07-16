@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Khoá:</label>
                            @foreach($academicYears as $academicYear)
                                @if(isset($academicYearId) && $academicYearId == $academicYear->id)
                                    {{ $academicYear->name }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-3">
                            <label>Chuyên ngành:</label>
                            @foreach($majors as $major)
                                @if(isset($majorId) && $majorId == $major->id)
                                    {{ $major->name }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-3">
                            <label>Lớp:</label>
                            @foreach($courses as $course)
                                @if(isset($courseId) && $courseId == $course->id)
                                    {{ $course->name }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-3">
                            <label>Môn:</label>
                            @foreach($subjects as $subject)
                                @if(isset($subjectId) && $subjectId == $subject->id)
                                    {{ $subject->name }}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @isset($students)
                        <form method="post" id="form-attendance">
                            <input type="hidden" name="course_id" value={{ $courseId }}>
                            <input type="hidden" name="subject_id" value="{{ $subjectId }}">
                            @csrf
                            <div class="form-group">
                                <label>Ngày</label>
                                <input readonly type="date" name="date"
                                       value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
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
                                <label>Giáo viên</label>
                                <select name="teacher_id" class="form-control">
                                    @foreach ($teachers as $teacher)
                                        <option
                                                value="{{ $teacher->id }}"
                                        >
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
                                                               @if ($loop->first)
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
        $('#btn-attendance').on('click', function () {
            $.ajax({
                type: 'POST',
                url: '{{ route('attendances.attendance') }}',
                data: $('#form-attendance').serialize(),
                success: function () {
                    $.toast({
                        heading: 'Thành công',
                        text: 'Điểm danh thành công',
                        icon: 'success',
                        loader: true,
                        position: 'bottom-right',
                    })
                },
                error: function () {
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
