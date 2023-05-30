@extends('layout-index')

@section( 'title', 'home' )


@section('content')
    <!-- item cards -->
    <div class="row">
        @foreach ($books->chunk(4) as $row)
            <div class="row">
                @foreach ($row as $book)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ $book->image_path }}" alt="Book Image" width="250px">
                            <div class="caption">
                                <h3>{{ $book->title }}</h3>
                                <p>{{ $book->description }}</p>
                                <div class="text-center"><a href="{{ route('books.show', $book) }}">Show Detail</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

@section('pagination')

<div class="row">

  <div class="text-center">
      {{ $books->links('pagination::bootstrap-4') }}
  </div>

@endsection()