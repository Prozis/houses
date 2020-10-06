@extends('layouts.app')

@section('content')
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>{{$article->title}}</h1>
    <div class="class="album py-5 bg-light"">
        <div class="row">
          @foreach ($article->smallImage as $key => $linkSmallImage)
           <div class="col-md-4">
           <div class="card mb-4 shadow-sm">
             <a href="{{$article->bigImage[$key]}}"></a>
             <img src="{{$linkSmallImage}}" alt="">
           </div>
           </div>
          @endforeach
        </div>
    </div>
    <p class="lead">{{$article->text}}</p>
      <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
  </div>
@endsection
