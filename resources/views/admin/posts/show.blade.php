@extends('layouts.dashboard')

@section('content')
    
    <h1> {{ $post->title }}</h1>

    <div> Creato il: {{ $post->created_at }} </div>
    <div> Aggiurnato il: {{ $post->updated_at }} </div>
    <div> Slug: {{ $post->slug }} </div>

    <h3 class="mt-3">Contenuto:</h3>
    <p> {{ $post->content }} </p>

@endsection