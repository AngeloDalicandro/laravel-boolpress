@extends('layouts.dashboard')

@section('content')

    <h1>Crea un nuovo post</h1>
    
    <form action="{{ route('admin.posts.store') }}" method="post">
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
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" name="content" value="{{ old('content') }}"  rows="5"></textarea>
        </div>

        <input type="submit" value="Salva Post">          
    </form>
@endsection