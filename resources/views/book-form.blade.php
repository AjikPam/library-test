@extends('layout')

@section( 'title', 'book-form' )

@section('content')
<form action="{{ route('books.store') }}" method="post" >
    @csrf
    
    <div class="form-group">
        <label for="title">ISBN</label>
        <input type="number" class="form-control" id="isbn" value="{{ old('isbn') }}" name="isbn" placeholder="Isbn">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="Title">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" value="{{ old('image_path') }}" name="image_path" id="image_path" placeholder="Image">
    </div>

    <div class="form-group">
        <label for="title">Publisher</label>
        <input type="text" class="form-control" id="publisher" value="{{ old('publisher') }}" name="publisher" placeholder="Publisher">
    </div>

    <div class="form-group">
        <label for="short_desc">Author</label>
        <input type="text" class="form-control" value="{{ old('author') }}" name="author" id="author" placeholder="Author">
    </div>
    <div class="form-group">
        <label for="short_desc">Category</label>
        <input type="text" class="form-control" value="{{ old('category') }}" name="category" id="category" placeholder="Category">
    </div>
    <div class="form-group">
        <label for="short_desc">Pages</label>
        <input type="text" class="form-control" value="{{ old('pages') }}" name="pages" id="pages" placeholder="Pages">
    </div>
    <div class="form-group">
        <label for="short_desc">Language</label>
        <input type="text" class="form-control" value="{{ old('language') }}" name="language" id="language" placeholder="Language">
    </div>

    <div class="form-group">
        <label for="short_desc">Publish Date</label>
        <input type="date" class="form-control" value="{{ old('publish_date') }}" name="publish_date" id="publish_date" placeholder="Publish_date">
    </div>

    <div class="form-group">
        <label for="short_desc">Subjects</label>
        <input type="text" class="form-control" value="{{ old('subjects') }}" name="subjects" id="subjects" placeholder="Subjects">
    </div>

    <div class="form-group">
        <label for="short_desc">Description</label>
        <input type="text" class="form-control" value="{{ old('description') }}" name="description" id="description" placeholder="Description">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      
</form>
@endsection