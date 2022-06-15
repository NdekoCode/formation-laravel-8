@extends('layouts.layout', ['title' => 'Liste des articles'])
@section('content')
    <x-articlesUtilities>
        {{-- On ajoute un composant slot dont son appel se faire par l'attribut sous forme d'une variable --}}
        <x-slot name="utilitiesAdmin">

            @auth

                <div class="ms-auto">
                    <a href="{{ route('app_postscreate') }}"
                        class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Ajouter un post</a>
                </div>
            @endauth
        </x-slot>
    </x-articlesUtilities>
    <div class="flex flex-wrap justify-center">

        @forelse ($posts as $post)
            <!-- This is an example component -->
            <div class="mx-auto max-w-lg">
                <x-cardPostComponent :post="$post" />
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
