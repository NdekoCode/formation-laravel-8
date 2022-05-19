@extends('layouts.app')
@section('content')
    <div class="m-1 p-3 shadow">

        <h2 class="mb-3 text-2xl font-bold text-gray-800"><a href="{{ route('app_postshow', $post->id) }}"
                class="decoration text-blue-300 decoration-blue-300">{{ $post['title'] }}</a></h2>
        <p class="my-2 text-sm text-gray-600">{{ $post['content'] }}</p>
    </div>
@endsection
