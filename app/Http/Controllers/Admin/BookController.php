<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    protected $rules = [
        'isbn_13' => 'required|unique:books|size:13|string',
        'title' => 'required|string|min:2|max:70',
        'series' => 'required|string|min:2|max:50',
        'author' => 'required|string|min:2|max:100|regex:/^[a-zA-Z ]+$/',
        'publisher' => 'required|string|min:2|max:80',
        'publication_date' => 'required|intiger|between:1450, 2023|',
        'plot' => 'required|string|min:15|max:65535',
        'genre' => 'required|string|min:2|max:40',
        'cover_image' => 'required|string|min:5|max:65535'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create', ['book' => new Book()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->rules;
        $data = $request->validate($rules);

        $newBook = new Book();
        $newBook->fill($data);
        $newBook->save();

        return redirect()->route('admin.project.show', $newBook->id)->with('message', "$newBook->title è stato creato con successo")->with('alert->type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view("admin.books.edit", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = $this->rules;
        $rules['isbn_13'] = ['required', 'size:13', 'string', Rule::unique('books')->ignore($book->id)];
        $data = $request->validate($rules);

        $book->update($data);

        redirect()->route('admin.books.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books.index')->with('message', "$book->title è stato eliminato con successo")->with('alert->type', 'warning');
    }
}
