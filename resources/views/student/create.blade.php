@extends('layout.master')
@section('content')
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="form-group col-3">
            <label>Tên sinh viên</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Giới tính</label>
            <label><input type="radio" name="gender" value="1" checked @if(old('gender') == '1') checked @endif>Nam</label>
            <label><input type="radio" name="gender" value="0" @if(old('gender') == '0') checked @endif>Nữ</label>
        </div>
        <div class="form-group col-3">
            <label>Ngày sinh</label>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Địa chỉ</label>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Lớp</label>
            <select name="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
@endsection