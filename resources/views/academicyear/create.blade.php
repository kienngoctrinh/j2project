@extends('layout.master')
@section('content')
    <form action="{{ route('academicyears.store') }}" method="post">
        @csrf
        <div class="form-group col-3">
            <label>Tên khoá</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
@endsection