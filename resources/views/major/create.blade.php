@extends('layout.master')
@section('content')
    <form action="{{ route('majors.store') }}" method="post">
        @csrf
        <div class="form-group col-3">
            <label>Chuyên ngành</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Khoá</label>
            <select name="academic_year_id" class="form-control">
                @foreach($academicyears as $academicyear)
                    <option value="{{ $academicyear->id }}" {{ old('academic_year_id') == $academicyear->id ? 'selected' : '' }}>
                        {{ $academicyear->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
@endsection