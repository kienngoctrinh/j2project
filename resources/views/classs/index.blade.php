@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(checkAdmin())
                    <div class="card-header">
                        <a href="{{ route('classses.create') }}" class="btn btn-success">
                            Create
                        </a>
                        <button id="btnExport" class="btn btn-success">Excel</button>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped table-centered mb-0" id="table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Course</th>
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
                                <td>{{ $each->major->name }}</td>
                                <td>{{ $each->course->name }}</td>
                                @if(checkAdmin())
                                    <td>
                                        <a href="{{ route('classses.edit', $each) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('classses.destroy', $each) }}" method="post">
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
@push('js')
    <script>
        $(document).ready(function(){
            $("#btnExport").click(function() {
                let table = document.getElementsByTagName("table");
                TableToExcel.convert(table[0], {
                    name: `excel.xlsx`,
                    sheet: {
                        name: 'Sheet 1'
                    }
                });
            });
        });
    </script>
@endpush
