<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Thêm sách thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::findOrFail($id);
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'year' => 'required|integer',
        'quantity' => 'required|integer|min:1',
    ]);

    $books = Book::findOrFail($id);
    $books->update($validated);

    // Điều hướng về trang index với thông báo thành công
    return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');

    }   
}
