@extends('layouts.app')

@section('content')
    <h2>{{$article->name}}</h2>
    <div>{{$article->body}}</div>
    <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
@endsection
