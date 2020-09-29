@extends('layouts.app')

@section('content')
<h3>Добавить статью</h3>

{{ Form::model($article, ['url' => route('articles.store')]) }}

  @include('article.form')
  {{ Form::submit('Создать') }}
{{ Form::close() }}
@endsection
