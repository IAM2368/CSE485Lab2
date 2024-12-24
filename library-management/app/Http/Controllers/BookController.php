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
        $books = Book::all();
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
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'quantity' => 'required|integer|min:1',
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
        $request->validate([
            'name' => 'required',
            'author' => 'required',
        ]);
        $books = Book::findOrFail($id);
        $books->update([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'year' => $request->input('year'),
            'quantity' => $request->input('quantity'),
        ]);
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
