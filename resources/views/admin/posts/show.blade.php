@extends('layouts.dashboard')

@section('content')
    
    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"  class="btn btn-primary">Modifica post</a>
    <h1> {{ $post->title }}</h1>

    <div> Creato il: {{ $post->created_at }} </div>
    <div> Aggiornato il: {{ $post->updated_at }} </div>
    <div> Slug: {{ $post->slug }} </div>

    <h3 class="mt-3">Contenuto:</h3>
    <p> {{ $post->content }} </p>

@endsection