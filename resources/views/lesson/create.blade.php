@extends('layout.master')
@section('content')
    <form action="{{ route('lessons.store') }}" method="post">
        @csrf
        <div class="form-group col-3">
            <label>Số buổi học</label>
            <input type="number" name="number_lesson" value="{{ old('number_lesson') }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Môn học</label>
            <select name="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
@endsection