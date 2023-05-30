@extends('layout')

@section( 'title', 'detail' )

@section('content')
  <div class="container">
    <h1>{{ $book->title }}</h1>
    <img src="{{ $book->image_path }}" alt="Book Image" width="250px">
    <p>Author: {{ $book->author->name }}</p>
    <p>Publisher: {{ $book->publisher }}</p>
    <p>ISBN: {{ $book->isbn }}</p>
    <p>Description: {{ $book->description }}</p>
    <p>Publish Date: {{ $book->publish_date }}</p>
    <p>Pages: {{ $book->pages }}</p>
    <p>Language: {{ $book->language }}</p>
  </div>
  @auth
    @if(Auth::user()->id == $book->user_id)
        <button class="text-center"><a href="{{ route('books.edit', $book) }}">Edit Detail</a></button>
        <button class="text-center"><a href="{{ route('books.destroy', $book->id) }}">Delete Book</a></button>
    @else
        <button class="text-center" disabled>Edit Detail</button>
        <button class="text-center" disabled>Delete Book</button>
    @endif
@endauth

      
@endsection

