<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    protected $rules= [
        'isbn_13'=>'required|unique:books|size:13|string',
        'title'=>'required|string|min:2|max:80',
        'series'=>'required|string|min:2|max:50',
        'author'=>'required|string|min:2|max:100|regex:/^[a-zA-Z ]+$/',
        'publisher'=> 'required|string|min:2|max:80',
        'publication_date'=> 'required|intiger|between:1450, 2023|',
        'plot'=>'required|string|min:15|max:65535',
        'genre'=> 'required|string|min:2|max:40',
        'cover_image'=>'required|string|min:5|max:65535'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create', ['book'=>new Book()]);
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
        $data= $request->validate($rules);

        $newBook= new Book();
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
        $rules['isbn_13']=['required', 'size:13', 'string', Rule::unique('books')->ignore($book->id)];
        $data= $request->validate($rules);

        $book->update($data);
    
        redirect()->route('admin.books.show', compact('book'));
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books.index')->with('message', "$book->title è stato eliminato con successo")->with('alert->type', 'warning');
    }

    /**
     * Display a listing of trash.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashedBooks= Book::onlyTrashed()->get();
        return view('admin.books.trashed', compact('trashedBooks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

     public function forceDelete($id){
        // keep forceDelete title
        $book= Book::onlyTrashed()->where('id', $id)->first();
        $titleRestoreBook= $book->title;
        
        Book::where("id", $id)->withTrashed()->forceDelete();
        return redirect()->route('admin.trashed')->with("message", "$titleRestoreBook è stato cancellato definitivamente")->with("alert-type", "warning");;
     }

     /**
     * Restore the specified resource from soft delete.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

     public function restore($id){
        // keep restore title
        $book= Book::onlyTrashed()->where('id', $id)->first();
        $titleRestoreBook= $book->title;

        Book::where("id", $id)->withTrashed()->restore();

        return redirect()->route('admin.trashed')->with("message", "$titleRestoreBook è stato ripristinato")->with("alert-type", "success");;
     }

   
}
