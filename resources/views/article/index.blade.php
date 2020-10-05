@extends('/layouts.app')

@section('title', 'Главная')

@section('content')


<div class="row">
  <div class="col-3">
      @include('inc.aside')
  </div>
<div class="col-9">
<div class="class="album py-5 bg-light"">

    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="{{$article->smallImage}}" alt="">

          <div class="card-body">
            <p class="card-text">
              <h6><a href="{{ route('articles.show', $article->id) }}">{{$article->title}}</a></h6>

            </p>
            <p>Цена: {{$article->price}}.</p>

            {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
            {{-- Используется для очень длинных текстов, которые нужно сократить --}}
            <p>{{Str::limit($article->text, 50)}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a  href="{{ route('articles.show', $article->id) }}">
                  <button  class="btn btn-primary" type="button" name="button">
                  Подробнее
                  </button>
                </a>
                @auth
                <a  href="{{ route('articles.destroy', $article) }} rel="nofollow"">
                  <button  class="btn" type="button" name="button">
                  Удалить
                  </button>
                </a>
                @endauth
              </div>

            </div>

          </div>

        </div>
        </div>
        @endforeach

    </div>
</div>
</div>

@endsection
