@extends('layout.master')
@section('content')
    <form action="{{ route('teachers.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        <br>
        Gender
        <input type="radio" name="gender" value="1" {{ $each->gender == 1 ? 'checked' : '' }}>Male
        <input type="radio" name="gender" value="0" {{ $each->gender == 0 ? 'checked' : '' }}>Female
        <br>
        Birthdate
        <input type="date" name="birthdate" value="{{ $each->birthdate }}">
        <br>
        Address
        <input type="text" name="address" value="{{ $each->address }}">
        <br>
        Phone
        <input type="text" name="phone" value="{{ $each->phone }}">
        <br>
        Email
        <input type="email" name="email" value="{{ $each->email }}">
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