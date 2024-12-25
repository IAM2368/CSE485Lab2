<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with('reader', 'book')->orderBy('borrow_date', 'desc')->get();
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.create', compact('readers', 'books'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'status' => 'required|boolean',
        ]);

        Borrow::create($validated);

        return redirect()->route('borrows.index')->with('success', 'Thêm mượn sách thành công!');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'reader_id' => 'required|exists:readers,id',
    //         'book_id' => 'required|exists:books,id',
    //         'borrow_date' => 'required|date|date_format:Y-m-d',
    //         'return_date' => 'required|date|date_format:Y-m-d|after:borrow_date',
    //         'status' => 'required|in:0,1',
    //     ]);
    
    //     Borrow::create([
    //         'reader_id' => $request->reader_id,
    //         'book_id' => $request->book_id,
    //         'borrow_date' => $request->borrow_date,
    //         'return_date' => $request->return_date,
    //         'status' => $request->status,
    //     ]);
    
    //     return redirect()->route('borrows.index')->with('success', 'Thêm mới phiếu mượn thành công!');
    // }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with('reader', 'book')->findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $readers = Reader::all();
        $books = Book::all();
        return view('Borrows.edit', compact('borrow', 'readers', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $borrow = Borrow::findOrFail($id);
        
        $borrow->update([
            'reader_id' => $request->input('reader_id'),
            'book_id' => $request->input('book_id'),
            'borrow_date' => $request->input('borrow_date'),
            'return_date' => $request->input('return_date'),
            'status' => $request->input('status'),
        ]);
    
        return redirect()->route('borrows.index')->with('success', 'Cập nhật phiếu mượn thành công');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Mượn sách đã được xóa thành công!');
    }
}
