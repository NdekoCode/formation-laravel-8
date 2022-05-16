@extends('layouts.app')
@section('content')
    <h1>Ma liste d'article</h1>
    @foreach ($posts as $post)
        <h2>{{ $post['title'] }}</h2>
        <p>{{ $post['description'] }}</p>
    @endforeach
@endsection
