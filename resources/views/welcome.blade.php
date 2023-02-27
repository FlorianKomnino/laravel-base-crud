@extends('layouts.app')
@section('content')

<section id="jumbo" class="jumbotron p-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="pb-3">
                    Welcome to My Favorite Books Store
                </h1>
                <a href="" class="btn btn-info">
                    Click here to see all our books
                </a>
            </div>
        </div>
    </div>
</section>
<section id="books-preview" class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    Our best sellers:
                </h3>
            </div>
        </div>
        <div class="row d-flex">
            @for ($i=0; $i < 3; $i++)
            <div class="col-4">
                <div class="card text-start">
                    <div class="card-header">
                        <p class="card-text text-center">
                            isbn
                        </p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            title
                        </h4>
                        <h6>
                            author
                        </h6>
                        <p class="card-text">
                            cover_image
                        </p>
                        <p class="card-text">
                            genre
                        </p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
@endsection