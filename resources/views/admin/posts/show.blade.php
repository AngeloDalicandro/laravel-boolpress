@extends('layouts.dashboard')

@section('content')
    
    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"  class="btn btn-primary">Modifica post</a>

    <form class="mt-2" action="{{ route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Cancella post" onClick="return confirm('Sei sicuro di voler cancellare?')">
    </form>

    <h1> {{ $post->title }}</h1>

    @if ($post->cover)
        <img src="{{ asset( '/storage/' . $post->cover) }}" alt=" {{ $post->title }} ">
    @endif

    <div> Creato il: {{ $post->created_at->format('l j F Y') }} </div>
    
    @if ($created_days_ago)
        <div> Creato {{ $created_days_ago }} giorni fa. </div>
    @endif

    <div> Aggiornato il: {{ $post->updated_at->format('l j F Y')  }} </div>
    <div> Slug: {{ $post->slug }} </div>

    
    <div>Categoria: {{ $post->category ? $post->category->name : 'Nessuna' }}  </div> 
    
    <div>Tags:
       @if($post->tags->isNotEmpty()) 
            @foreach ($post->tags as $tag)
            {{ $tag->name }} {{ !$loop->last ? ',' : '' }}
            @endforeach
       @else 
        Nessuno
        @endif
    </div>

    <h3 class="mt-3">Contenuto:</h3>
    <p> {{ $post->content }} </p>

@endsection