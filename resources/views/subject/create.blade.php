@extends('layout.master')
@section('content')
    <form action="{{ route('subjects.store') }}" method="post">
        @csrf
        <div class="form-group col-3">
            <label>Môn</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="form-group col-3">
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