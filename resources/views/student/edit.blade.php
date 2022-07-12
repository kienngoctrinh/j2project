@extends('layout.master')
@section('content')
    <form action="{{ route('students.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-3">
            <label>Tên sinh viên</label>
            <input type="text" name="name" value="{{ $each->name }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Giới tính</label>
            <label><input type="radio" name="gender" value="1" {{ $each->gender == 1 ? 'checked' : '' }}>Nam</label>
            <label><input type="radio" name="gender" value="0" {{ $each->gender == 0 ? 'checked' : '' }}>Nữ</label>
        </div>
        <div class="form-group col-3">
            <label>Ngày sinh</label>
            <input type="date" name="birthdate" value="{{ $each->birthdate }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Địa chỉ</label>
            <input type="text" name="address" value="{{ $each->address }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $each->email }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Số điện thoại</label>
            <input type="text" name="phone" value="{{ $each->phone }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Lớp</label>
            <select name="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ ($course->id == $each->course_id) ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection