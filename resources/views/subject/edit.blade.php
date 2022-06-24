@extends('layout.master')
@section('content')
    <form action="{{ route('subjects.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        <br>
        Major
        <select name="major_id">
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ ($major->id == $each->major_id) ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Update</button>
    </form>
@endsection