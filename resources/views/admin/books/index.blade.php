@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            @if (session('message'))
                <div class="alert alert-{{ session('message_class') }} mb-3">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12">
            <a href="{{route('admin.books.create')}}" class="btn btn-success">
                Create new book
            </a>
            <a href="{{route('admin.trashed')}}" class="btn btn-warning">
                Trash
            </a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title</th>
                        <th scope="col">author</th>

                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name}} {{ $book->author->surname }}</td>

                            <td>
                                <div class="actionButtons d-flex">
                                    <a href="{{route('admin.books.show', $book->id)}}" class="btn btn-sm btn-primary">Show</a>
                                    <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-sm btn-warning mx-2">Edit</a>
                                    <form action="{{route('admin.books.destroy', $book->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{-- {{ $books->links() }} --}}
        </div>
    </div>
    {{$books->links()}}
</div>
@endsection
