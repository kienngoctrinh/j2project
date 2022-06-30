@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('slots.create') }}" class="btn btn-success">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-centered mb-0" id="table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Slot</th>
                            <th>Teacher</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $each)
                            <tr>
                                <td>{{ $each->id }}</td>
                                <td>{{ $each->slot }}</td>
                                <td>{{ $each->teacher->name }}</td>
                                <td>{{ $each->subject->name }}</td>
                                <td>{{ $each->classs->name }}</td>
                                <td>{{ $each->date }}</td>
                                <td>
                                    <a href="{{ route('slots.edit', $each) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('slots.destroy', $each) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
