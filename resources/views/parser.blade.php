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
    <input type="text" name="countArticles" id="countArticles" value="1000" placeholder="" class="form-control">
  </div>

  <button type="submit" name="button" class="btn btn-primary">Старт</button>
</form>


<?php
// $host = 'https://realt.by/sale/cottages';
//
// $data_site = file_get_contents($host); // получаем страницу сайта-донора
//
// // Получаем объект dom
// $document = phpQuery::newDocument($data_site);
// $countArticles = 3;
//
// // .bd-item - класс для каждого объявления
// $content_prev = $document->find('.bd-item ');
// $countAddedArticles = 0;
//
// // перебираем в цикле все посты
// foreach ($content_prev as $el) {
//   if($countAddedArticles >= $countArticles) break;
//   // Преобразуем dom объект в объект phpQuery с помощью метода pq();
//   $pq = pq($el);
//   $title = $pq->find('.title .media .media-body a')->attr('title'); // парсим заголовок статьи
//   $link = $pq->find('.title .media .media-body a')->attr('href'); // парсим ссылку на статью
//   //$text = $pq->find('.bd-item-right .bd-item-right-center p'); // парсим текст в превью статьи
//   $smallImage = $pq->find('img:first')->attr('src'); // парсим ссылку на изображение в превью статьи
//   $price = $pq->find('.price-byr'); //цена
//
//   if(!empty($link)) {
//     $data_link = file_get_contents($link);
//     $pageDOM = phpQuery::newDocument($data_link);
//
//       $page = pq($pageDOM);
//       //$content = $page->find('.inner-center-content');
//       $bigImage = $page->find('.photo-item .lightgallery img')->attr('src'); //парсим первое фото
//       $articleID = $page->find('.f14:first')->text();
//       $articleID = preg_replace("/[^,.0-9]/", '', $articleID);
//
//       $text = $page->find('.description')->text();
//
//
//   }
//
//   echo "<p>$title <br> $link <br> $price
//     <br>simg: $smallImage
//       <br> Bigimg: $bigImage
//       <br> ID: $articleID
//
//       </p>";
//   var_dump($smallImage);
//
//   $countAddedArticles++;
// }

 ?>

@endsection
