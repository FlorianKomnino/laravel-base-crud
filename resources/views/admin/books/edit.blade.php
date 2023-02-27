
{{-- 
|--------------------------------------------------------------------------
| Project edit in Admin
|--------------------------------------------------------------------------
|
| This is the edit 'Project' section of the website
| available to the Admin.
|
--}}
@extends('layouts.app')

@section('pageTitle' , 'My favorite Books store - book modify')

@section('content')
@include('admin.books.partials.editCreate',["route" => "admin.books.update"  , "formMethod" => "PUT" ])    
@endsection
