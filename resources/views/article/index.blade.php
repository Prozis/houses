@extends('/layouts.app')

@section('title', 'Главная')

@section('content')


<div class="row">
  <div class="col-3">
      @include('inc.aside')
  </div>

  <div class="col-9">
    <div class="row">
      @foreach ($articles as $article)
      <div class="col">
        <h4><a href="{{ route('articles.show', $article->id) }}">{{$article->name}}</a></h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <p>{{Str::limit($article->body, 50)}}</p>
        @auth
          <a href="{{ route('articles.edit', $article) }}">Редактировать</a>
          <a href="{{ route('articles.destroy', $article) }}" rel="nofollow">Удалить</a>
        @endauth
      </div>
      @endforeach
    </div>
      <br><br>
  </div>
</div>
@endsection
