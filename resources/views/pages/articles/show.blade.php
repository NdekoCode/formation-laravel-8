@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between">
        <form action="{{ route('app_deletepost', $post->id) }}" method="post">
            @csrf
            <button type="submit" class="text-decoration-none mx-2 mt-2 rounded bg-red-600 px-3 py-2 text-white"
                onclick="return confirm('voulez-vous vraiment supprimer {{ $post->title }}')">Supprimer
                l'article</button>
        </form>
        <a href="{{ route('app_postupdate', $post->id) }}"
            class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Modifier le post</a>
    </div>
    <div class="m-1 p-3 shadow">

        @if (!empty($post->image->path))
            <div>
                <img src="{{ $post->image->path }}" alt="">
            </div>
        @endif
        <h2 class="mb-3 text-2xl font-bold text-gray-800">{{ $post['title'] }}</h2>
        <p class="my-2 text-sm text-gray-600">{{ $post['content'] }}</p>
    </div>
    {{-- @forelse ($post->comments as $comment)
        <small class="text-sm text-gray-400">Publier le
            {{ $post->created_at->format('d / m / Y') }}, {{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->content }}</p>
    @empty
        <div class="m-1 rounded border border-blue-500 bg-blue-200 p-2 text-blue-500">Pas de commentaire encore disponible
            sur cet article
        </div>
    @endforelse --}}
    <div class="rounded-br-full bg-gray-200">

        <strong>{{ $post->artist->name }}</strong>
        <div class="h-10 w-10">
            <img src="{{ $post->artist->avatar }}" alt="" class="rounded">
        </div>
    </div>
@endsection
