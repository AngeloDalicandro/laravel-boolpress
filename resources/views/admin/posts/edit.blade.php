@extends('layouts.dashboard')

@section('content')
    
<h1>Modifica un post</h1>
    
<form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title)}}">
    </div>

    <div class="mb-3">
        <label for="category_id">Categoria:</label>
        <select class="form-select" name="category_id" name="category_id">
            <option value="">Nessuna</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>   
            @endforeach
          </select>
    </div>

    <div class="mb3">
        <h3>Tags:</h3>

        @if ($errors->any())
            @foreach($tags as $tag) 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                    {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        @else 
            @foreach($tags as $tag) 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                    {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        @endif    

    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control" id="content" name="content" rows="5"> {{ old('content', $post->content) }} </textarea>
    </div>

    
    <div class="mb-3">
        <label for="image" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="image" name="image">


        <div >Immagine corrente: 
            <img style="width: 15rem" src=" {{ asset( '/storage/' . $post->cover) }} " alt=" {{ $post->title }}">
        </div>
    </div>

    <input type="submit" value="Salva Modifiche">          
</form>

@endsection