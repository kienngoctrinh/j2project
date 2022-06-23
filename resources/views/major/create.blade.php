@extends('layout.master')
@section('content')
    <form action="{{ route('majors.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        <button>Create</button>
    </form>
@endsection