@extends('layouts.app')
@section('content')
    <div class="flex justify-end">
        <a href="{{ route('app_postupdate', $post->id) }}"
            class="text-decoration-none mx-2 mt-2 rounded bg-blue-700 px-3 py-2 text-white">Modifier le post</a>
    </div>
    <div class="m-1 p-3 shadow">

        <h2 class="mb-3 text-2xl font-bold text-gray-800">{{ $post['title'] }}</h2>
        <p class="my-2 text-sm text-gray-600">{{ $post['content'] }}</p>
    </div>
@endsection
