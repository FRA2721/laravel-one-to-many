@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-8">
        <h1 class="text-center mb-3">Post: {{ $post->title }}</h1>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Title:</label>
              <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-3">
              <label for="link" class="form-label">Link:</label>
              <input type="text" class="form-control" id="link"
                    name="link"value="{{ old('link', $post->link) }}">
            </div>

            <div class="mb-3">
              <label for="cover_image" class="form-label">Cover image:</label>
              <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description:</label>
              <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="row justify-content-center mt-4">
              <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection