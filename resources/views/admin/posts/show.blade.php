@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="text-start">
      <a class="btn btn-success mt-4" href="{{ route('admin.posts.index') }}">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-8">
        <h1 class="text-center mt-3">{{ $post->title }}</h1>
        <div class="d-flex justify-content-between mt-4">
          <p>{{ $post->slug }}</p>
        </div>

        <div class="text-center my-3">
          <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }} image" class="w-50">
        </div>
        <p class="mt-3">{{ $post->description }}</p>
      </div>
    </div>
  </div>
@endsection