@extends('layouts.app')
@section('content')
    <h1 class="mb-3 text-3xl font-bold text-gray-800">Ma liste d'article</h1>
    <div class="flex justify-end">
        <a href="{{ route('app_postscreate') }}"
            class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Ajouter un post</a>
    </div>
    <div class="flex flex-wrap justify-center">

        @forelse ($posts as $post)
            <div class="m-1 max-h-max min-h-[250px] w-3/12 basis-1/4 p-3 shadow-md">
                <div>
                    <img src="{{ Storage::disk('public')->exists($post->image->path) ? Storage::url($post->image->path) : url($post->image->path) }}"
                        alt="{{ $post->title }}">
                </div>
                <h2 class="mb-3 text-2xl font-bold text-gray-800"><a href="{{ route('app_postshow', $post->id) }}"
                        class="decoration text-blue-300 decoration-blue-300">{{ $post->title }}</a></h2>
                <div class="flex items-center justify-between">
                    <small class="mb-3 text-sm text-gray-400">{{ count($post->comments) }} Commentaires</small>

                    <small class="mb-3 text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
                </div>
                @if (!empty($post->artist))
                    <div class="mr-auto flex items-center justify-between">
                        <div class="h-20 w-20 overflow-hidden rounded-full">
                            <img src="{{ Storage::url($post->artist->avatar) }}" alt="{{ $post->title }}"
                                class="rounded-full">
                        </div>
                        <strong>{{ $post->artist->name }}</strong>

                    </div>
                @endif
                <div class="flex items-center justify-between">
                    @forelse ($post->tags as $tag)
                        <small class="m-1 mb-3 rounded bg-blue-400 p-1 text-sm text-gray-600"><a
                                href="#">{{ $tag->name }}</a>
                        </small>
                    @empty

                        <small class="mb-3 rounded bg-gray-400 p-1 text-sm text-gray-600">Pas de tas</small>
                    @endforelse
                </div>
                <p class="my-2 text-sm text-gray-600">
                    @if (strlen($post->content) > 255)
                        {{ substr($post->content, 0, 255) }}...<a href="{{ route('app_postshow', $post->id) }}"
                            class="text-blue-300">Voir plus</a>
                    @else
                        {{ $post->content }}
                    @endif
                </p>
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
