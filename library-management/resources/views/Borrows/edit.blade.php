@extends('borrows.app')

@section('content')
    <div class="container">
        <h1>Sửa phiếu mượn</h1>
        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="reader_id">Độc giả:</label>
                <select class="form-control" id="reader_id" name="reader_id" required>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                            {{ $reader->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book_id">Sách:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="borrow_date">Ngày mượn:</label>
                <input type="text" class="form-control @error('borrow_date') is-invalid @enderror" 
                       id="borrow_date" name="borrow_date" 
                       value="{{ old('borrow_date') }}" placeholder="Nhập ngày mượn (YYYY-MM-DD)" required>
                @error('borrow_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="return_date">Ngày trả:</label>
                <input type="text" class="form-control @error('return_date') is-invalid @enderror" 
                       id="return_date" name="return_date" 
                       value="{{ old('return_date') }}" placeholder="Nhập ngày trả (YYYY-MM-DD)" required>
                @error('return_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Đang mượn</option>
                    <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Đã trả</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
