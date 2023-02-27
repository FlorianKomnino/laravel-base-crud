{{-- 
|--------------------------------------------------------------------------
| Form blade in Admin books folder
|--------------------------------------------------------------------------
|
| This is the form used in the create and edit blade file of the books folder
|
--}}
@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Check Errors</h3>
    </div>
@endif
<form action="{{route($route , $book->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($formMethod)
    <article class="card">
        <div class="card-header">
            <h2 class="text-center m-0 p-3 fw-bold">{{$formMethod === 'POST' ? 'Create a new book' : "Edit the book '$book->title'"}}</h2>
        </div>
        <div class="card-body">

            <div class="form-outline mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="my_form-el form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" aria-describedby="isbn-errors" placeholder="Insert the isbn" minlength="13" maxlength="13" value="{{old('isbn',$book->isbn)}}">
                @error('isbn')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="my_form-el form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title-errors" placeholder="Insert the title" minlength="2" maxlength="80" value="{{old('title',$book->title)}}">
                @error('title')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="my_form-el form-control @error('series') is-invalid @enderror" id="series" name="series" aria-describedby="series-errors" placeholder="Insert the series" minlength="2" maxlength="50" value="{{old('series',$book->series)}}">
                @error('series')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="my_form-el form-control @error('author') is-invalid @enderror" id="author" name="author" aria-describedby="author-errors" placeholder="Insert the book's author" minlength="2" maxlength="100" value="{{old('author',$book->author)}}">
                @error('author')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="my_form-el form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" aria-describedby="publisher-errors" placeholder="Insert the book's publisher" minlength="2" maxlength="80" value="{{old('publisher',$book->publisher)}}">
                @error('publisher')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" class="my_form-el form-control @error('publication_date') is-invalid @enderror" id="publication_date" name="publication_date" aria-describedby="publication_date-errors" placeholder="Insert the book's publication_date" value="{{old('publication_date',$book->publication_date)}}">
                @error('publication_date')
                <div class="form-text invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-outline mb-3">
                <label for="plot" class="form-label">Plot</label>
                <textarea class="my_form-el form-control  @error('plot') is-invalid @enderror" id="plot" cols="30" rows="10" name="plot" aria-describedby="plot-errors" minlength="10" placeholder="Insert the plot">
                    {{old('plot',$book->plot)}}
                </textarea>
                @error('plot')
                <div class="form-text invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>  

            <div class="form-outline mb-3">
                <label for="genre" class="form-label">Genre</label>
                <textarea class="my_form-el form-control  @error('genre') is-invalid @enderror" id="genre" cols="30" rows="10" name="genre" aria-describedby="genre-errors" minlength="10" placeholder="Insert the genre">
                    {{old('genre',$book->genre)}}
                </textarea>
                @error('genre')
                <div class="form-text invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
    
            <div class="form-outline mb-3">
                <label for="cover_image" class="form-label">Img da inserire</label>
                <input type="file" class="my_form-el form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" minlength="2" maxlength="255" value="{{old('cover_image',$book->cover_image)}}">
                @error('cover_image')
                    <div class="form-text invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my_btn">
                Submit
            </button>
        </div>
    </article>
</form>

