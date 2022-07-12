@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(checkAdmin())
                    <div class="card-header">
                        <a href="{{ route('students.create') }}" class="btn btn-success">
                            Thêm
                        </a>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped table-centered mb-0" id="table-data">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên sinh viên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Lớp</th>
                            @if(checkAdmin())
                                <th>Sửa</th>
                                <th>Xoá</th>
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
                                <td>{{ $each->email }}</td>
                                <td>{{ $each->phone }}</td>
                                <td>{{ $each->course->name }}</td>
                                @if(checkAdmin())
                                    <td>
                                        <a href="{{ route('students.edit', $each) }}" class="btn btn-primary">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('students.destroy', $each) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Xoá</button>
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
