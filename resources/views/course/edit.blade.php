@extends('layout.master')
@section('content')
    <form action="{{ route('courses.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-3">
            <label>Tên lớp</label>
            <input type="text" name="name" value="{{ $each->name }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Chuyên ngành</label>
            <select name="major_id" class="form-control">
                @foreach($majors as $major)
                    <option value="{{ $major->id }}" {{ ($major->id == $each->major_id) ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <label>Khoá</label>
            <select name="academic_year_id" class="form-control">
                @foreach($academicyears as $academicyear)
                    <option value="{{ $academicyear->id }}" {{ ($academicyear->id == $each->academic_year_id) ? 'selected' : '' }}>
                        {{ $academicyear->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection