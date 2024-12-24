@extends('books.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin sách</h1>
        <form action="{{ route('books.update', $books->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên sách:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="author">Tác giả:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="category">Loại sách:</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="year">Năm sản xuất:</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
