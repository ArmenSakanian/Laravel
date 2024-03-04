@extends('base')

@section('title')
Статьи
@endsection

@section('content')
<h1>{{ $article->name }}</h1>
<img src='{{ asset("images/{$article->preview_image}") }}' alt="" height="300px">
<p>{{ $article->desc }}</p>
<p>{{ $article->date }}</p>

@endsection