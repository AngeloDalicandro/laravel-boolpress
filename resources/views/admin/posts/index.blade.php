@extends('layouts.dashboard')

@section('content')
    <h1> Lista dei post </h1>

    @if ($show_deleted_message === 'yes')
        <div class="alert alert-success" role="alert">
        Post cancellato correttamente.
      </div>
    @endif

    <div class="row row-cols-3">
        @foreach ($posts as $post)
            <div class="col mt-5">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title"> {{ $post['title'] }} </h5>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection