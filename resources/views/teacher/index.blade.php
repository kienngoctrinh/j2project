@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(checkAdmin())
                    <div class="card-body">
                        <a href="{{ route('teachers.create') }}" class="btn btn-success">
                            Create
                        </a>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped table-centered mb-0" id="table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Major</th>
                            @if(checkAdmin())
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
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
                                <td>{{ $each->phone }}</td>
                                <td>{{ $each->email }}</td>
                                <td>{{ $each->major->name }}</td>
                                @if(checkAdmin())
                                    <td>
                                        <a href="{{ route('teachers.edit', $each) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('teachers.destroy', $each) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
