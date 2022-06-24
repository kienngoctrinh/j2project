@extends('layout.master')
@section('content')
    <form action="{{ route('students.store') }}" method="post">
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
        Email
        <input type="email" name="email" value="{{ old('email') }}">
        <br>
        Phone
        <input type="text" name="phone" value="{{ old('phone') }}">
        <br>
        Class
        <select name="classs_id">
            @foreach($classses as $classs)
                <option value="{{ $classs->id }}" {{ old('classs_id') == $classs->id ? 'selected' : '' }}>
                    {{ $classs->name }}
                </option>
            @endforeach
        </select>
        <br>
        <button>Create</button>
    </form>
@endsection