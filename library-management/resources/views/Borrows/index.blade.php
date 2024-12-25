@extends('borrows.app')

@section('content')
    <div class="container">
        <h1>Danh sách phiếu mượn</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên bạn đọc</th>
                    <th>Sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $index => $borrow)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d-m-Y') }}</td>
                        <td>{{ $borrow->status == 0 ? 'Đang mượn' : 'Đã trả' }}</td>
                        <td>
                            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Trước</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Sau</a>
            </li>
        </ul>
    </nav>
@endsection
