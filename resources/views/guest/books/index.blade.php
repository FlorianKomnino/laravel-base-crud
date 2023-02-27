@extends('layouts.app')

{{-- da cancellare prima di fare il merge su master --}}
@php
    $ciao = []; //giusto per vedere come appare l'index se non ci sono libri da mostrare
@endphp

@section('content')
    <div class="container">
        <div class="row g-3 py-3">
            {{ $books->links() }}
            @forelse ($books as $book)
                <div class="col-12 col-sm-6">
                    <a href="{{route('guest.books.show', [$book])}}" class="card p-2 text-decoration-none text-black">
                        <h4 class="fw-bold mb-2">{{$book->series}} : {{$book->title}}</h4>
                        <div class="bottom flex-row d-flex">
                            <div class="left w-25">
                                <img class="img-fluid object-fit-contain object-position-center h-100 rounded-1" src="{{$book->cover_image}}" alt="{{$book->title}}'s cover">
                            </div>
                            <div class="right flex-grow-1 ms-2">
                                <div>di <strong>{{$book->author}}</strong></div>
                                {{-- <pre class="text-secondary">Libri | {{$book->genre}}</pre> --}}
                                <pre class="text-secondary">{{$book->publisher}}, {{$book->publication_date->format('Y')}}</pre>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <h1 class="text-center text-secondary opacity-75 fw-bold mt-5 pt-5">There are no book to show yet <span class="display-4 fw-bold">:/</span></h1>
            @endforelse
            {{ $books->links() }}
        </div>
    </div>
@endsection