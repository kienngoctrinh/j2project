@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('process_register_teacher') }}" method="post">
                        @csrf
                        <div class="form-group col-3">
                            <label>Tên giáo viên</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <button class="btn btn-primary">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection