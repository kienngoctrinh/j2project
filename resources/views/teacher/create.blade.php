@extends('layout.master')
@section('content')
    <form action="{{ route('teachers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Tên giáo viên</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <label><input type="radio" name="gender" value="1" checked @if(old('gender') == '1') checked @endif>Nam</label>
            <label><input type="radio" name="gender" value="0" @if(old('gender') == '0') checked @endif>Nữ</label>
        </div>
        <div class="form-group">
            <label>Ngày sinh</label>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Số điên thoại</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Chuyên ngành</label>
            <select name="major_id" class="form-control">
                @foreach($majors as $major)
                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
@endsection