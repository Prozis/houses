<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
//use App\vendor\electrolinux\phpquery\phpquery\phpQuery;
use phpQuery;

//используем модель объявлений Article
class ParserController extends Controller
{


  public function store(Request $request)
  {

    $host = $request->input('host');
    $startPage = $request->input('startPage');
    $countArticles = $request->input('countArticles');
    $host = $host."/?page=".$startPage;
    $countArticles = $countArticles ?? 10000;
    $liminPage = $request->input('liminPage');
    $countAddedArticles = 0;
    $countlookedArticle = 0;

    for($i = 0; $i < $liminPage; $i++) {
      $data_site = file_get_contents($host); // получаем страницу сайта-донора

      // Получаем объект dom
      $document = phpQuery::newDocument($data_site);

      // .bd-item - класс для каждого объявления
      $content_prev = $document->find('.bd-item ');

      // перебираем в цикле все посты
      foreach ($content_prev as $el) {
        if($countAddedArticles >= $countArticles) break; //ограничение количества записей
        $parsedArticle = []; //массив с данными объявления
        // Преобразуем dom объект в объект phpQuery с помощью метода pq();
        $pq = pq($el);
        $parsedArticle['title'] = $pq->find('.title .media .media-body a')->attr('title'); // парсим заголовок статьи
        $link = $pq->find('.title .media .media-body a')->attr('href'); // парсим ссылку на статью

        if(!empty($link)) { //переходим по ссылке в объявление (если не пустая)
          $data_link = file_get_contents($link);
          $pageDOM = phpQuery::newDocument($data_link);
          $page = pq($pageDOM);
          $images = $page->find('.photo-item img'); //парсим фото
          $parsedArticle['smallImage'] = [];//массивы ссылок на изображения
          $parsedArticle['bigImage'] = [];
          foreach ($images as $item) {
            $linkBigImage = pq($item)->parents('a'); //получаем родительскую ссылку изображения
            $parsedArticle['bigImage'][] = pq($linkBigImage)->attr('href');
            $parsedArticle['smallImage'][] = pq($item)->attr('src');
          }
          $parsedArticle['articleID'] = $page->find('.f14:first')->text(); //ID
          $parsedArticle['text'] = $page->find('.description')->text(); //основной текст
          $parsedArticle['phone'] = $page->find('.phone-operator:first')->attr('data-full');
          $parsedArticle['updateDate'] = $page->find('.table-row-left:contains("Дата обновления")')->next()->text();
          $parsedArticle['area'] = $page->find('.table-row-left:contains("Площадь участка")')->next()->text();
          $parsedArticle['price'] = $pq->find('.price-switchable')->attr('data-0'); //цена в долларах
        }

        $parsedArticle['articleID'] = preg_replace("/[^,.0-9]/", '', $parsedArticle['articleID']); //убираем буквы из ID
        $parsedArticle['price'] = preg_replace("/[^0-9]/", '', $parsedArticle['price']);
        $parsedArticle['text'] = strip_tags($parsedArticle['text']); //убираем теги
        $parsedArticle['title'] = strip_tags($parsedArticle['title']);
        if(count($parsedArticle['smallImage']) == 0) {
          $parsedArticle['smallImage'][] = '';
          $parsedArticle['bigImage'][] = '';
        }

        //обновляем счетчик просмотренных объявлений
        $countlookedArticle++;

        //проверка на повторность
        $articlesID = Article::pluck('articleID')->toArray();
        if(in_array($parsedArticle['articleID'], $articlesID)) continue;

        $article = new Article();

        //заполняем поля объявления
        $article->fill($parsedArticle);
        $article->save();

        $countAddedArticles++;
      } //конец цикла foreach

      phpQuery::unloadDocuments(); //выгружаем документы
    } //конец цикла for

    // Редирект на указанный маршрут с добавлением флеш-сообщения
    $request->session()->flash('status', "Просмотрено: $countlookedArticle, добавлено: $countAddedArticles объявлений в базу данных!");
    return redirect()->route('parser');
  }
}
