@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Create A New Blog</h2>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="2">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="d-block">
            @error('image')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Create Blog</button>
    </form>
@endsection
