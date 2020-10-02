@extends('layouts.app')

@section('content')
<h3>Создать объявление</h3>

{{ Form::model($article, ['url' => route('articles.store')]) }}

  @include('article.form')
  {{ Form::submit('Создать') }}
{{ Form::close() }}
@endsection
