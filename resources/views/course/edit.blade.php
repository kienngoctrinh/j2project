@extends('layout.master')
@section('content')
    <form action="{{ route('courses.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        <br>
        <button>Update</button>
    </form>
@endsection