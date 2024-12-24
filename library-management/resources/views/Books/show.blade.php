@extends('books.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Book</h1>
        <p><strong>Tên sách:</strong> {{ $books->name }}</p>
        <p><strong>Tác giả:</strong> {{ $books->author }}</p>
        <p><strong>Loại sách:</strong> {{ $books->category}}</p>
        <p><strong>Năm sản xuất:</strong> {{ $books->year}}</p>
        <p><strong>Số lượng:</strong> {{ $books->quantity}}</p>
        <p><strong>Thời gian mượn:</strong> {{ $books->created_at}}</p>
        <p><strong>Thời gian trả:</strong> {{ $books->updated_at}}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection


