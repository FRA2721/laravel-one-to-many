@extends('layouts.admin')

@section('content')
  <div class="container mt-3">
    <h2 class="text-center">Project (Post) list</h2>

    <div class="row justify-content-center">
      <div class="col-8">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success my-3">CREATE</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Title:</th>
              <th scope="col">Date:</th>
              <th scope="col">Operations:</th>
            </tr>
          </thead>

            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <th scope="row">{{ $post->title }}</th>
                  <td>{{ $post->created_at }}</td>
                  <td>
                    <a class="btn btn-success" href="{{ route('admin.posts.show', $post->slug) }}">
                      <i class="fa-solid fa-eye"></i>
                    </a>

                    <a class="btn btn-warning m-2" href="{{ route('admin.posts.edit', $post->slug) }}">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                      
                    <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST"
                        class="d-inline">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                      </button>

                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>

        </table>
      </div>
    </div>
  </div>
@endsection