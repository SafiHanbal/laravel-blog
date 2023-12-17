@extends('layouts.app')

@section('content')
    @foreach ($blogs->chunk(3) as $blogRow)
        <div class="row">
            @foreach ($blogRow as $blog)
                <div class="col">
                    <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                        <img src="{{ $blog->imageUrl }}" alt="blog image" height="200px" width="100%">
                        <h5>{{ $blog->title }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
