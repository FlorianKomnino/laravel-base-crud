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
            <a href="{{route('admin.books.index')}}" class="btn btn-success">
                Back to book table
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
                    @foreach ($trashedBooks as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>

                            <td>
                                <div class="actionButtons d-flex">
                                    <form action="{{route('admin.forceDelete', $book->id)}}" method="POST">
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
</div>
@endsection
