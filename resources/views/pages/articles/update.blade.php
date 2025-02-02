@extends('layouts.layout', ['title' => 'Modifier ' . $post->title])
@section('content')
    <div class="m-1 p-3 shadow">
        {{-- <div class="m-2 rounded border-red-400 bg-red-200 p-2 text-red-500">ol</div> --}}
        <form action="{{ route('app_storeupdate', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Titre de l'article</label>
                <input type="text" id="title" name="title"
                    class="offset-2 {{ $errors->has('title') ? 'ring-red-400 ring-offset-red-400' : 'ring-gray-300 ring-offset-blue-300' }} w-full rounded ring"
                    placeholder="Entrer le titre de votre article"
                    value="{{ $post->title ? $post->title : old('title') }}">
                @if ($errors->has('title'))
                    <div class="text-md text-red-500">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="image">Image de l'article</label>
                <input type="file" name="image"
                    class="offset-2 {{ $errors->has('image') ? 'ring-red-400 ring-offset-red-400' : 'ring-gray-300 ring-offset-blue-300' }} w-full rounded ring"
                    accept="image/png, image/jpeg, image/gif, image/jpg" value="{{ $post->image->path }}">
                @if ($errors->has('image'))
                    <div class="text-md text-red-500">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="content">Contenu de l'article</label>
                <textarea
                    class="offset-2 {{ $errors->has('content') ? 'ring-red-400 ring-offset-red-400' : 'ring-gray-300 ring-offset-blue-300' }} w-full rounded ring"
                    name="content" id="content" cols="30" rows="5" placeholder="Entrer le contenus de votre article">{{ $post->content ? $post->content : old('content') }}</textarea>

                @if ($errors->has('content'))
                    <div class="text-md text-red-500">{{ $errors->first('content') }}</div>
                @endif

            </div>
            <button type="submit" class="text-md rounded-md bg-blue-600 p-3 text-white">Ajouter un article</button>
        </form>
    </div>
@endsection
