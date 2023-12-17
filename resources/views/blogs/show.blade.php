@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $blog->title }}</h2>

        <div>
            @if ($blog->user->id === auth()?->user()?->id)
                <a href="{{ route('blogs.edit', ['blog' => $blog]) }}" class="btn btn-dark">Edit</a>
                <form class="d-inline" action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
    <p class="mb-1">{{ $blog->description }}</p>
    <p>by {{ $blog->user->name }}</p>
    <img src="{{ $blog->imageUrl }}" alt="blog post image" class="mb-3">
    <div>
        @php
            $contentArr = explode("\r\n\r\n", $blog->content);
        @endphp

        @foreach ($contentArr as $contentItem)
            <p class="mb-4">{{ $contentItem }}</p>
        @endforeach
    </div>
@endsection
