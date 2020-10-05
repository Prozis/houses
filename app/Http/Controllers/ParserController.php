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

    $host = $host ?? 'https://realt.by/sale/cottages';
    $countArticles = $countArticles ?? 10000;

    $data_site = file_get_contents($host); // получаем страницу сайта-донора

    // Получаем объект dom
    $document = phpQuery::newDocument($data_site);


    // .bd-item - класс для каждого объявления
    $content_prev = $document->find('.bd-item ');
    $countAddedArticles = 0;

    // перебираем в цикле все посты
    foreach ($content_prev as $el) {
      if($countAddedArticles >= $countArticles) break; //ограничение количества записей
      // Преобразуем dom объект в объект phpQuery с помощью метода pq();
      $pq = pq($el);
      $title = $pq->find('.title .media .media-body a')->attr('title'); // парсим заголовок статьи
      $link = $pq->find('.title .media .media-body a')->attr('href'); // парсим ссылку на статью
      //$description = $pq->find('.bd-item-right .bd-item-right-center p'); // парсим текст в превью статьи
      //ниже почемуто не работает
      $smallImage = $pq->find('.lazy')->attr('src'); // парсим ссылку на изображение в превью статьи
      $price = $pq->find('.price-byr')->text(); //цена

      if(!empty($link)) {
        $data_link = file_get_contents($link);
        $pageDOM = phpQuery::newDocument($data_link);

          $page = pq($pageDOM);
          //$content = $page->find('.inner-center-content');
          $bigImage = $page->find('.photo-item .lightgallery img')->attr('src'); //парсим первое фото
          $articleID = $page->find('.fr .f14')->text(); //id объявления
          $articleID = preg_replace("/[^,.0-9]/", '', $articleID); //оставляем только цифры
          $text = $page->find('.description')->text(); //основной текст

      }

      $article = new Article();
      // Заполнение статьи данными из формы

      $text = preg_replace('/\s?<p[^>]*?>.*?<\/p>\s?/si', ' ', $text); //убираем теги из текста

      //костыль пока не пойму почему не работает маленькое изображение
      $smallImage = $bigImage;

      $article->articleID = $articleID;
      $article->title = $title;
      $article->smallImage = $smallImage;
      $article->price = $price;
      $article->bigImage = $bigImage;
      $article->text = $text;

      //$article->fill($data);
      // При ошибках сохранения возникнет исключение
      $article->save();

      $countAddedArticles++;
    	// echo "
    	// 	<div>
    	// 		<h3><a href='$link'>$h2</a></h3>
    	// 		<p>$text</p>
    	// 		img - $img
    	// 	</div>
    	// ";

    	}

      phpQuery::unloadDocuments(); //выгружаем документы

      // Записываем информацию о превьюшках в базу данных
      // $post_prev = R::dispense('postprev');
          // if(!empty($h2)) $post_prev->h2 = strip_tags($h2); // strip_tags удаляет HTML тэги из строки
          // if(!empty($link)) $post_prev->link = HOST.$link;
          // if(!empty($text)) $post_prev->text = strip_tags($text);
          // if(!empty($img)) $post_prev->img = HOST.$img;
          // R::store($post_prev);

          // пробегаемся по всем ссылкам на посты и парсим контент из открытых статей
      //     if(!empty($link)) $data_link = file_get_contents(HOST.$link);
      //     $document_с = phpQuery::newDocument($data_link);
      //     $content = $document_с->find('.broden-ajax-content');
    	//
      //     foreach ($content as $element) {
      //         $pq2 = pq($element);
      //         $h1 = $pq2->find('.post-title h1'); // парсим главный заголовок статьи
      //         $text_all = $pq2->find('.article__content .txt'); // парсим контент часть статьи
      //     }
    	//
      // // Записываем информацию о статьях в базу данных
      // $post = R::dispense('post');
      //     if(!empty($h1)) $post->h1 = strip_tags($h1);
      //     if(!empty($text_all)) $post->text = strip_tags($text_all);
      //     R::store($post);





    // Редирект на указанный маршрут с добавлением флеш-сообщения
    $request->session()->flash('status', "$countAddedArticles объявлений добавлено в базу данных!");
    return redirect()->route('parser');
  }
}
