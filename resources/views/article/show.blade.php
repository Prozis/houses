@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1>{{$article->title}}</h1>
  <div class="class="album py-5 bg-light"">
    <div class="row">
      @foreach ($article->smallImage as $key => $linkSmallImage)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="{{$article->bigImage[$key]}}">
          <img src="{{$linkSmallImage}}" alt="" style="width:100%">
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <p class="lead">{{$article->text}}</p>

</div>
<div class="">
  <p>Площадь участка: {{$article->area}}</p>
  <p>Дата обновления: {{$article->updateDate->format('d.m.Y') }}</p>
  <?php
  if($article->price == 0) {
    $price = "Цена договорная";
  } else  {
    $price = $article->price."$.";
  }
   ?>
  <p>Цена: <?= $price ?></p>

  <p>Телефон: {{$article->phone}}</p>
  <a  href="{{ route('articles.edit', $article->id) }}">
    <button  class="btn btn-primary" type="button" name="button">
      Редактировать
    </button>
  </a>
</div>

@endsection
