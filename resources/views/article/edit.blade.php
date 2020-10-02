@extends('layouts.app')

@section('content')
<h3>Исправить объявление</h3>

{{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
  @include('article.form')
  {{ Form::submit('Обновить') }}
{{ Form::close() }}
@endsection
