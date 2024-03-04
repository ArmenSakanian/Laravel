@extends('base')

@section('title')
Статьи
@endsection

@section('content')
<h1>Статьи (из файла)</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Short Desc</th>
        <th>Image</th>
        <th>Date</th>
    </tr>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->name }}</td>
            @if (isset($article->short_desc))
            <td>{{ $article->short_desc }}</td>
            @else
            <td>Нет данных</td>
            @endif
            <td><a href="/one_article/?id={{ $article->id }}"><img src='{{ asset("images/{$article->preview_image}") }}' alt="" height="100px"></a></td>
            <td>{{ $article->date }}</td>
        </tr>
    @endforeach
</table>

@endsection