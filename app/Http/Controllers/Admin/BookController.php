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
        'publication_date' => 'required|integer|between:01/01/1450, 27/02/2023',
        'plot' => 'required|string|min:15|max:65535',
        'genre' => 'required|string|min:2|max:40',
        'cover_image' => 'required|image|max:6000'
    ];

    protected $errorMessages = [
        'isbn_13.required' => 'Il codice ISBN è necessario.',
        'isbn_13.unique' => 'Il codice ISBN non può essere uguale ad un altro codice ISBN in archivio.',
        'isbn_13.size' => 'Il codice ISBN deve essere lungo 13 caratteri.',
        'isbn_13.string' => 'Il codice ISBN deve essere una stringa.',


        'title.required' => 'Il titolo è necessario.',
        'title.string' => 'Il titolo deve essere una stringa.',
        'title.min' => 'Il titolo deve essere lungo almeno 2 caratteri.',
        'title.max' => 'Il titolo non può superare i 70 caratteri.',

        'series.required' => 'La serie di appartenenza è necessaria.',
        'series.min' => 'Il nome della serie di appartenenza deve essere lungo almeno 2 caratteri.',
        'series.max' => 'Il nome della serie di appartenenza non può superare i 50 caratteri.',
        'series.string' => 'Il nome della serie di appartenenza deve essere una stringa.',

        'author.required' => 'L\'autore è necessario.',
        'author.string' => 'Il nome dell\'autore deve essere una stringa.',
        'author.min' => 'Il nome dell\'autore deve essere lungo almeno 2 caratteri.',
        'author.max' => 'Il nome dell\'autore non può superare i 100 caratteri.',

        'publisher.required' => 'La casa produttrice è necessaria.',
        'publisher.string' => 'Il nome della casa produttrice deve essere una stringa.',
        'publisher.min' => 'Il nome della casa produttrice deve essere lungo almeno 2 caratteri.',
        'publisher.max' => 'Il nome della casa produttrice non può superare gli 80 caratteri.',

        'publication_date.required' => 'La data di pubblicazione è necessaria.',
        'publication_date.integer' => 'La data di pubblicazione deve essere espressa in numeri interi.',
        'publication_date.between' => 'La data di pubblicazione deve essere compresa tra il 01/01/1450 e il 27/02/2023',

        'plot.required' => 'La trama è necessaria.',
        'plot.string' => 'La trama deve essere una stringa.',
        'plot.min' => 'La trama deve essere lunga almeno 15 caratteri.',
        'plot.max' => 'La trama non può superare i 65535 caratteri.',

        'genre.required' => 'Il genere è necessario.',
        'genre.string' => 'Il genere deve essere una stringa.',
        'genre.min' => 'Il genere deve essere lungo almeno 2 caratteri.',
        'genre.max' => 'Il genere non può superare i 40 caratteri.',

        'cover_image.required' => 'L\'immagine è necessaria.',
        'cover_image.image' => 'Il file caricato deve essere un\'immagine.',
        'cover_image.max' => 'L\'immagine è troppo grande. (max: 6000kb)',

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
        $errorMessage = $this->errorMessages;
        $data = $request->validate($rules, $errorMessage);

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
        $errorMessage = $this->errorMessages;
        $rules['isbn_13'] = ['required', 'size:13', 'string', Rule::unique('books')->ignore($book->id)];
        $data = $request->validate($rules, $errorMessage);

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
