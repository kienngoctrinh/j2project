@extends('layout.master')
@section('content')
    <form action="{{ route('majors.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-3">
            <label>Chuyên ngành</label>
            <input type="text" name="name" value="{{ $each->name }}" class="form-control">
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