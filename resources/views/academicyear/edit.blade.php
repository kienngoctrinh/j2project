@extends('layout.master')
@section('content')
    <form action="{{ route('academicyears.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-3">
            <label>Tên khoá</label>
            <input type="text" name="name" value="{{ $each->name }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection