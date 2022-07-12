@extends('layout.master')
@section('content')
    <form action="{{ route('lessons.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-3">
            <label>Số buổi học</label>
            <input type="number" name="number_lesson" value="{{ $each->number_lesson }}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label>Môn học</label>
            <select name="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ ($subject->id == $each->subject_id) ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection