@extends('/layouts.app')

@section('title', 'Парсер')

@section('content')
<h2>Настроки парсера</h2>
<!--  -->

<form class="" action="{{route('parser-post')}}" method="post">
  @csrf
  <div class="form-group">
    <label for=";">Сайт-донор</label>
    <input type="text" name="host" id="host" value="https://realt.by/sale/cottages" placeholder="имя" class="form-control">
  </div>

  <div class="form-group">
    <label for="startPage">Начальная страница</label>
    <input type="text" name="startPage" id="startPage" value="0" placeholder="" class="form-control">
  </div>

	<div class="form-group">
    <label for="countArticles">Количество записей</label>
    <input type="text" name="countArticles" id="countArticles" value="all" placeholder="" class="form-control">
  </div>

  <button type="submit" name="button" class="btn btn-primary">Старт</button>
</form>


@endsection
