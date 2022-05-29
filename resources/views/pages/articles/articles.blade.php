@extends('layouts.app')
@section('content')
    <h1 class="mb-3 text-3xl font-bold text-gray-800">Ma liste d'article</h1>
    <div class="flex justify-end">
        <a href="{{ route('app_postscreate') }}"
            class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Ajouter un post</a>
    </div>
    <div class="flex flex-wrap justify-center">

        @forelse ($posts as $post)
            <div class="m-1 max-h-max min-h-[250px] w-3/12 basis-1/4 p-3 shadow">
                @if (!empty($post->image->path))
                    <div>
                        <img src="{{ $post->image->path }}" alt="">
                    </div>
                @endif
                <h2 class="mb-3 text-2xl font-bold text-gray-800"><a href="{{ route('app_postshow', $post->id) }}"
                        class="decoration text-blue-300 decoration-blue-300">{{ $post['title'] }}</a></h2>
                <div class="flex items-center justify-between">
                    <small class="mb-3 text-sm text-gray-400">{{ count($post->comments) }} Commentaires</small>

                    <small class="mb-3 text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
                </div>
                @forelse ($post->tags as $tag)
                    <small class="m-1 mb-3 rounded bg-blue-400 px-1 text-sm text-gray-600"><a
                            href="#">{{ $tag->name }}</a>
                    </small>
                @empty

                    <small class="mb-3 rounded bg-gray-400 px-1 text-sm text-gray-600">Pas de tas</small>
                @endforelse
                <p class="my-2 text-sm text-gray-600">{{ $post['content'] }}</p>
            </div>
        @empty
            <div class="m-1 w-full rounded border border-blue-500 bg-blue-200 p-3 text-blue-600">
                Aucun poste en base de donnée
            </div>
        @endforelse
    </div>
    <div>
        {{ $posts->links() }}
    </div>
@endsection
