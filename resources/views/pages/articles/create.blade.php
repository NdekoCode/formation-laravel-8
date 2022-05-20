@extends('layouts.app')
@section('content')
    <div class="m-1 p-3 shadow">
        {{-- <div class="m-2 rounded border-red-400 bg-red-200 p-2 text-red-500">ol</div> --}}
        <form action="{{ route('app_poststore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Titre de l'article</label>
                <input type="text" id="title" name="title"
                    class="offset-2 {{ $errors->has('title') ? 'ring-red-400 ring-offset-red-400' : 'ring-gray-300 ring-offset-blue-300' }} w-full rounded ring"
                    placeholder="Entrer le titre de votre article" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <div class="text-md text-red-500">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="content">Contenu de l'article</label>
                <textarea class="offset-2 {{ $errors->has('content') ? 'ring-red-400 ring-offset-red-400' : 'ring-gray-300 ring-offset-blue-300' }} w-full rounded ring"
                    name="content" id="content" cols="30" rows="5"
                    placeholder="Entrer le contenus de votre article">{{ old('content') }}</textarea>

                @if ($errors->has('content'))
                    <div class="text-md text-red-500">{{ $errors->first('content') }}</div>
                @endif

            </div>
            <button type="submit" class="text-md rounded-md bg-blue-600 p-3 text-white">Ajouter un article</button>
        </form>
    </div>
@endsection
