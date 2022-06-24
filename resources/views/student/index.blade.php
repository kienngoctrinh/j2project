@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('students.create') }}" class="btn btn-success">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-centered mb-0" id="table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $each)
                            <tr>
                                <td>{{ $each->id }}</td>
                                <td>{{ $each->name }}</td>
                                <td>{{ $each->gender_name }}</td>
                                <td>{{ $each->birthdate }}</td>
                                <td>{{ $each->address }}</td>
                                <td>{{ $each->email }}</td>
                                <td>{{ $each->phone }}</td>
                                <td>{{ $each->classs->name }}</td>
                                <td>
                                    <a href="{{ route('students.edit', $each) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('students.destroy', $each) }}" method="post">
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
