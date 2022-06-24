@extends('layout.master')
@section('content')
    <form action="{{ route('subjects.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        Major
        <select name="major_id">
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Create</button>
    </form>
@endsection