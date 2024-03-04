@extends('base')

@section('title')
Статьи
@endsection

@section('content')
<h1>{{ $article->name }}</h1>

    <section class="article-section">
        <p>{{ $article->desc }}</p>
        <p>{{ $article->date }}</p>

        @can('update')
            <div class="button-box">
                <a href="/article/{{$article->id}}/edit" class="button button_blue">Редактировать</a>
                <form class="form-for-button" action="/article/{{ $article->id }}" method="POST"> 
                    @csrf
                    @method('DELETE')
                    <button class="button button_red" type="submit">Удалить</button>
                </form>
            </div>
        @endcan
    </section>
    <section class="comment-section">
        <h2>Комментарии к статье</h2>
        @if (Auth::check())
            <form class="form" action="/comment/store" method="POST">
                @csrf
                <fieldset>
                    <legend>Создание комментария</legend>
                     
                    <label class="form__label" for="title">Заголовок</label>
                    <input class="form__input" type="text" name="title" id="title" required>

                    <label class="form__label" for="text">Текст</label>
                    <textarea name="text" id="text" required></textarea>

                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <button class="button button_blue" type="submit">Отправить</button>
                </fieldset>
            </form>
        @endif
        <div class="comments-container">
            @foreach ($comments as $comment)
            <div class="comment">
                <p class="comment__author">{{ $comment->getAuthorName() }}</p>
                <p class="comment__title">{{ $comment->title }}</p>
                <p class="comment__text">{{ $comment->text }}</p>
                <p class="comment__date">{{ $comment->created_at }}</p>
                @can('comment', $comment) 
                <div class="button-box">
                    <a href="/comment/edit/{{ $comment->id }}" class="button button_blue">Редактировать</a>
                    <a href="/comment/delete/{{ $comment->id }}" class="button button_red">Удалить</a>
                </div>
                @endcan
            </div>
            @endforeach
        </div>
    </section>
@endsection