@extends('layouts.layout', ['title' => 'Liste des articles'])
@section('content')
    <div class="mx-auto mb-3 mt-5 flex max-w-7xl items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Ma liste d'article</h1>
        @auth

            <div class="ms-auto">
                <a href="{{ route('app_postscreate') }}"
                    class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Ajouter un post</a>
            </div>
        @endauth
    </div>
    <div class="flex flex-wrap justify-center">

        @forelse ($posts as $post)
            <!-- This is an example component -->
            <div class="mx-auto max-w-lg">
                <div class="mb-5 max-w-sm rounded-lg border border-gray-200 bg-white shadow-md">
                    <a href="{{ route('app_postshow', $post->id) }}" class="min-h-[100px] overflow-hidden">
                        <img class="rounded-t-lg"
                            src="{{ Storage::disk('public')->exists($post->image->path) ? Storage::url($post->image->path) : url($post->image->path) }}"
                            alt="{{ $post->title }}">
                    </a>

                    <div class="p-5">
                        <div class="mb-3 flex items-center justify-between">
                            <small class="mb-3 text-sm text-gray-400">{{ count($post->comments) }} Commentaires</small>

                            <small class="mb-3 text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="flex items-center">
                            @forelse ($post->tags as $tag)
                                <small class="m-1 mb-3 rounded bg-blue-400 p-1 text-sm text-gray-600"><a
                                        href="#">{{ $tag->name }}</a>
                                </small>
                            @empty

                                <small class="mb-3 rounded bg-gray-400 p-1 text-sm text-gray-600">Pas de tas</small>
                            @endforelse
                        </div>
                        <a href="{{ route('app_postshow', $post->id) }}">
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h2>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">
                            @if (strlen($post->content) > 150)
                                {{ substr($post->content, 0, 150) }}...<a href="{{ route('app_postshow', $post->id) }}"
                                    class="text-blue-300">Voir plus</a>
                            @else
                                {{ $post->content }}
                            @endif
                        </p>

                        <a class="mt-3 inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
                            href="#">
                            Read more
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="m-1 w-full rounded border border-blue-500 bg-blue-200 p-3 text-blue-600">
                Aucun poste en base de donnée
            </div>
        @endforelse
    </div>
    <div class="mb-5 bg-white">
        {{ $posts->links() }}
    </div>
@endsection
