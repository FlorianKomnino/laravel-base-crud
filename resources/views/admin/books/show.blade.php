@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <div class="card text-center mb-4">
                <div class="card-header">
                    <h3>{{$book->title}}</h3>
                </div>
                <div class="row card-body text-start">
                    <div class="col-7 card-text">
                        <h5>{{$book->series}}</h5>
                        <ul>
                            <li><span class="text-secondary font-weight-bold">author: </span>{{ $book->author->name}} {{ $book->author->surname }}</li>
                            <li><span class="text-secondary font-weight-bold">plot: </span>{{$book->plot}}</li>
                            <li><span class="text-secondary font-weight-bold">publisher: </span>{{$book->publisher}}</li>
                            <li><span class="text-secondary font-weight-bold">publication date: </span>{{$book->publication_date}}</li>
                            <li><span class="text-secondary font-weight-bold">genre: </span>{{$book->genre}}</li>
                        </ul>
                    </div>
                    <div class="col-5 bg-dark px-3">
                        {{--@if ( str_starts_with($book->cover_image, 'http'))
                            <img src="{{ $book->cover_image }}" alt="book image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="book image" class="img-fluid">
                        @endif--}}
                    </div>
                </div>

                <div class="row col-4 ms-auto me-3 my-3">
                    <div class="col-6 homeButtonContainer text-center">
                        <a href="{{route('admin.books.index')}}" class="btn btn-sm btn-primary">Back to the list</a>
                    </div>
                    <div class="col-3 homeButtonContainer text-center">
                        <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                    <div class="col-3 homeButtonContainer text-center">
                        <form action="{{route('admin.books.destroy', $book->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($previousBook))
            <div class="col-2">
                <a class="btn btn-outline-primary" href="{{route('admin.books.show',$previousBook->id)}}">previous</a>
            </div>
        @else
            <div class="col-2">
                <a class="btn btn-outline-secondary disabled" href="">previous</a>
            </div>
        @endif

        @if (isset($nextBook))
            <div class="col-2">
                <a class="btn btn-outline-primary" href="{{route('admin.books.show',$nextBook->id)}}">next</a>
            </div>
        @else
            <div class="col-2">
                <a class="btn btn-outline-secondary disabled" href="">next</a>
            </div>
        @endif
    </div>
</div>
@endsection
