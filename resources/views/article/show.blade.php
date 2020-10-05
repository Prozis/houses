@extends('layouts.app')

@section('content')
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>{{$article->title}}</h1>
    <img src="{{$article->bigImage}}" alt="">
    <p class="lead">{{$article->text}}</p>
      <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
  </div>
@endsection
