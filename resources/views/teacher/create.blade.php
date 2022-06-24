@extends('layout.master')
@section('content')
    <form action="{{ route('teachers.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        Gender
        <input type="radio" name="gender" value="1" checked>Male
        <input type="radio" name="gender" value="0">Female
        <br>
        Birthdate
        <input type="date" name="birthdate" value="{{ old('birthdate') }}">
        <br>
        Address
        <input type="text" name="address" value="{{ old('address') }}">
        <br>
        Phone
        <input type="text" name="phone" value="{{ old('phone') }}">
        <br>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
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