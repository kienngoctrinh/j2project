@extends('layout.master')
@section('content')
    <form action="{{ route('students.update', $each) }}" method="post">
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
        Email
        <input type="email" name="email" value="{{ $each->email }}">
        <br>
        Phone
        <input type="text" name="phone" value="{{ $each->phone }}">
        <br>
        Class
        <select name="classs_id">
            @foreach($classses as $classs)
                <option value="{{ $classs->id }}" {{ ($classs->id == $each->classs_id) ? 'selected' : '' }}>
                    {{ $classs->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Update</button>
    </form>
@endsection