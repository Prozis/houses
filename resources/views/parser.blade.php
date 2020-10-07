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
    <label for="liminPage">Лимит страниц</label>
    <input type="text" name="liminPage" id="startPage" value="1" placeholder="" class="form-control">
  </div>

	<div class="form-group">
    <label for="countArticles">Лимит записей</label>
    <input type="text" name="countArticles" id="countArticles" value="10" placeholder="" class="form-control">
  </div>

  <button type="submit" name="button" class="btn btn-primary">Старт</button>
</form>


<?php
// $host = 'https://realt.by/sale/cottages';
// $startPage = 1;
// $limitArticles = 3;
//
// $liminPage = 1;
// $countAddedArticles = 0;
// $countlookedArticle = 0;
//
// for($i = 0; $i < $liminPage; $i++) {
//   $data_site = file_get_contents($host); // получаем страницу сайта-донора
//
//   // Получаем объект dom
//   $document = phpQuery::newDocument($data_site);
//
//   // .bd-item - класс для каждого объявления
//   $content_prev = $document->find('.bd-item ');
//
//   // перебираем в цикле все посты
//   foreach ($content_prev as $el) {
//     if($countAddedArticles >= $limitArticles) break; //ограничение количества записей
//     $parsedArticle = []; //массив с данными объявления
//     // Преобразуем dom объект в объект phpQuery с помощью метода pq();
//     $pq = pq($el);
//     $parsedArticle['title'] = $pq->find('.title .media .media-body a')->attr('title'); // парсим заголовок статьи
//     $link = $pq->find('.title .media .media-body a')->attr('href'); // парсим ссылку на статью
//     $parsedArticle['price'] = $pq->find('.price-byr')->text(); //цена
// echo "end";
//     if(!empty($link)) { //переходим по ссылке в объявление (если не пустая)
//       echo "inter";
//       $data_link = file_get_contents($link);
//       $pageDOM = phpQuery::newDocument($data_link);
//       $page = pq($pageDOM);
//       $images = $page->find('.photo-item img'); //парсим фото
//       $bigImagesArray = [];//массивы ссылок на изображения
//       $smallImagesArray = [];
//       foreach ($images as $item) {
//         $linkBigImage = pq($item)->parents('a'); //получаем родительскую ссылку изображения
//         $parsedArticle['bigImage'][] = pq($linkBigImage)->attr('href');
//         $parsedArticle['smallImage'][] = pq($item)->attr('src');
//       }
//       $parsedArticle['articleID'] = $page->find('.f14:first')->text(); //ID
//       echo "ID-".$parsedArticle['articleID'];
//       $parsedArticle['text'] = $page->find('.description')->text(); //основной текст
//
//       $parsedArticle['phone'] = $page->find('.phone-operator:first')->attr('data-full');
//       $parsedArticle['area'] = $page->find('.table-row-left:contains("Площадь участка")')->next()->text();
//
//     }
//
//             // $parsedArticle['articleID'] = preg_replace("/[^,.0-9]/", '', $parsedArticle['articleID']); //убираем буквы из ID
//             // $parsedArticle['text'] = strip_tags($parsedArticle['text']); //убираем теги
//             // $parsedArticle['title'] = strip_tags($parsedArticle['title']);
//             // if(count($parsedArticle['smallImage']) == 0) {
//             //   $parsedArticle['smallImage'][] = '';
//             //   $parsedArticle['bigImage'][] = '';
//             // }
//             $countlookedArticle++;
//             $countAddedArticles++;
//             var_dump($parsedArticle);
// }
// }


 ?>

@endsection
