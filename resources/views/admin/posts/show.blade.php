@extends('layouts.dashboard')

@section('content')
    
    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"  class="btn btn-primary">Modifica post</a>

    <form class="mt-2" action="{{ route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Cancella post" onClick="return confirm('Sei sicuro di voler cancellare?')">
    </form>

    <h1> {{ $post->title }}</h1>

    <div> Creato il: {{ $post->created_at }} </div>
    <div> Aggiornato il: {{ $post->updated_at }} </div>
    <div> Slug: {{ $post->slug }} </div>

    <h3 class="mt-3">Contenuto:</h3>
    <p> {{ $post->content }} </p>

@endsection