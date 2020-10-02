@extends('layouts.app')

@section('content')
    <h2>{{$article->title}}</h2>
    <div>{{$article->text}}</div>
    <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
@endsection
