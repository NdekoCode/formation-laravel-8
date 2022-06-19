@extends('layouts.layout', ['title' => $post->title])
@section('content')
    @auth

        <div class="flex items-center justify-between">
            <form action="{{ route('app_deletepost', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="px-3 py-2 mx-2 mt-2 text-white bg-red-600 rounded text-decoration-none"
                    onclick="return confirm('voulez-vous vraiment supprimer {{ $post->title }}')">Supprimer
                    l'article</button>
            </form>
            <a href="{{ route('app_postupdate', $post->id) }}"
                class="px-3 py-2 mx-2 mt-2 text-white bg-blue-700 rounded text-decoration-none">Modifier le post</a>
        </div>
    @endauth
    <div class="p-3 m-1 shadow">

        @if (!empty($post->image->path))
            <div>
                <img src="{{ Storage::disk('public')->exists($post->image->path) ? Storage::url($post->image->path) : url($post->image->path) }}"
                    alt="">
            </div>
        @endif
        <h2 class="mb-3 text-2xl font-bold text-gray-800">{{ $post['title'] }}</h2>
        <p class="my-2 text-sm text-gray-600">{{ $post['content'] }}</p>
    </div>
    @forelse ($post->comments as $comment)
        <small class="text-sm text-gray-400">Publier le
            {{ $post->created_at->format('d / m / Y') }}, {{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->content }}</p>

    @empty
        <div class="p-2 m-1 text-blue-500 bg-blue-200 border border-blue-500 rounded">Pas de commentaire encore disponible
            sur cet article
        </div>
    @endforelse
    @if (isset($post->artist))
        <div class="bg-gray-200 rounded-br-full">
            <strong>{{ $post->artist->name }}</strong>
            <div class="w-10 h-10">
                <img src="{{ url($post->artist->avatar) }}" alt="" class="rounded">
            </div>
        </div>
    @endif
@endsection
