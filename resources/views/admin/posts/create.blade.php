@extends('layouts.dashboard')

@section('content')

    <h1>Crea un nuovo post</h1>
    
    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

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
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="category_id">Categoria:</label>
            <select class="form-select" name="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : "" }}> {{ $category->name }} </option>   
                @endforeach
              </select>
        </div>

        <div class="mb3">
            <h3>Tags:</h3>

            @foreach($tags as $tag) 

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                    {{ $tag->name }}
                    </label>
                </div>

            @endforeach
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="5">"{{ old('content') }}"</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image">
          </div>

        <input type="submit" value="Salva Post">          
    </form>
@endsection