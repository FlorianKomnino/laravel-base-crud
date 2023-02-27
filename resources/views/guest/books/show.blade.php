@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-3 pt-5">
            <div class="col-12 col-sm-9 py-5 mt-5 m-auto">
                <div class="card p-2">
                    <h4 class="fw-bold text-center mb-2">{{$book->series}} : {{$book->title}}</h4>
                    <div class="bottom flex-row d-flex">
                        <div class="left w-50">
                            <img class="img-fluid object-fit-contain object-position-center h-100 rounded-1" src="{{$book->cover_image}}" alt="{{$book->title}}'s cover">
                        </div>
                        <div class="right d-flex flex-column justify-content-between w-50 ms-2">
                            <div class="top">
                                <div>di <strong>{{$book->author}}</strong></div>
                                <pre class="text-secondary">{{$book->publisher}}, {{$book->publication_date->format('Y')}}</pre>
                                <p class="">Libri | {{$book->plot}}</p>
                                <div class="text-secondary">Genre | {{$book->genre}}</div>
                            </div>
                            <div class="bottom">
                                <a class="btn btn-primary" href="{{route('guest.books.index')}}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection