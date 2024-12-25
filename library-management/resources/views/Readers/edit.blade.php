@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin bạn đọc</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên bạn đọc:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $reader->name) }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $reader->birthday) }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $reader->address) }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $reader->phone) }}" required>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
