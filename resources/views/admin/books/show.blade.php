@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    {{$book->title}}
                </div>

                {{-- <div class="card-image mt-3">
                    @if ( str_starts_with($book->image, 'http'))
                        <img src="{{ $book->image }}" alt="book image" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/' . $book->image) }}" alt="book image" class="img-fluid">
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-text">
                        {{$book->content}}
                    </div>
                </div> --}}


            </div>
            <div class="homeButtonContainer text-center mt-5">
                <a href="{{route('admin.books.index')}}" class="btn btn-sm btn-primary">Back to the list</a>
            </div>
            <div class="homeButtonContainer text-center mt-2">
                <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-sm btn-warning">Edit</a>
            </div>
            <div class="homeButtonContainer text-center mt-2">
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
@endsection
