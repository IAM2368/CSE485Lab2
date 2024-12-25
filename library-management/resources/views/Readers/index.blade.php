@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Danh sách bạn đọc</h1>
        <a href="{{ route('readers.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên bạn đọc</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $index => $reader)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
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
