@extends('admin.layout.master')
@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    <form action="{{ route('admin.catelogue.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="" class="form-lable">Name:</label>
                    <input type="text" placeholder="Nhập tên..." class="form-control" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-lable">file:</label>
                    <input type="file" class="form-control" name="cover">
                </div>
            </div>

            <div class="col-md-6">
                <input type="checkbox" class="form-check-input" name="is_active" value="1">renember me
            </div>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
@endsection
