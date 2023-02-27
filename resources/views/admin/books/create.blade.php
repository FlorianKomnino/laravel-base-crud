
{{-- 
|--------------------------------------------------------------------------
| Project create in Admin
|--------------------------------------------------------------------------
|
| This is the create 'Project' section of the website
| available to the Admin.
|
--}}
@extends('layouts.app')

@section('pageTitle' , "My favorite Books store - create a book record")

@section('content')
@include('admin.books.partials.editCreate',["route" => "admin.books.store"  , "formMethod" => "POST" ])
@endsection
