@extends('layout.master')
@section('content')
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        <button>Create</button>
    </form>
@endsection