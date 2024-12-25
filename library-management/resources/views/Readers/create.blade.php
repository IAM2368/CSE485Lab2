@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Thêm mới bạn đọc</h1>
        <form action="{{ route('readers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên bạn đọc:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
