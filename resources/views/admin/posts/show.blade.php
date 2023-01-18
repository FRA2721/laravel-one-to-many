@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="text-start">
      <a class="btn btn-success mt-4" href="{{ route('admin.posts.index') }}">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-8">
        <h1 class="text-center mt-3">{{ $post->title }}</h1>
        <h3 class="mt-3 text-success">{{ $post->type ? $post->type->name : 'No category' }}</h3>
        <div class="d-flex justify-content-between mt-2">
          <h4>{{ $post->created_at }}</h4>
          <p>{{ $post->slug }}</p>
        </div>
        @if ($post->cover_image)
          <div class="text-center my-3">
              <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }} image" class="w-50">
          </div>
        @endif
        <p class="mt-3">{{ $post->description }}</p>
      </div>
    </div>
  </div>
@endsection