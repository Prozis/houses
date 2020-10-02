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

    $data_site = file_get_contents($host); // получаем страницу сайта-донора
    //require_once('/vendor/electrolinux/phpquery/phpQuery/phpQuery.php');
    $document = phpQuery::newDocument($data_site);
      // .bd-item - класс для каждого объявления
    $content_prev = $document->find('.bd-item ');

    // перебираем в цикле все посты
    foreach ($content_prev as $el) {
      $pq = pq($el); // pq это аналог $ в jQuery
      $title = $pq->find('.title .media .media-body a')->attr('title'); // парсим заголовок статьи
      $link = $pq->find('.title .media .media-body a')->attr('href'); // парсим ссылку на статью
      $text = $pq->find('.bd-item-right .bd-item-right-center p'); // парсим текст в превью статьи
      // $img = $pq->find('.bd-item-left .bd-item-left-top a img')->attr('src'); // парсим ссылку на изображение в превью статьи
      $price = "";
      $img = "";

      if(!empty($link)) $data_link = file_get_contents($link);
      $document_с = phpQuery::newDocument($data_link);
      $content = $document_с->find('.broden-ajax-content');

        foreach ($content as $element) {
            $pq2 = pq($element);
            $img = $pq->find('.photo-item .lightgallery img')->attr('src'); //парсим первое фото
            $area = $pq2->find('.table-row-right'); // парсим площадь
            $price = $pq2->find('.price-byr'); // парсим цену
        }


      //запись объявления в базу данных

      // $data = $this->validate($request, [
      //   // У обновления немного изменённая валидация. В проверку уникальности добавляется название поля и id текущего объекта
      //   // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
      //   'title' => 'required|unique:articles,name,' . $article->id,
      //   'text' => 'required|min:10',
      // ]);

      $article = new Article();
      // Заполнение статьи данными из формы

      $article->title = $title;
      $article->text = $text;
      $article->price = $price;
      $article->bigImage = $img;


      //$article->fill($data);
      // При ошибках сохранения возникнет исключение
      $article->save();

    	// echo "
    	// 	<div>
    	// 		<h3><a href='$link'>$h2</a></h3>
    	// 		<p>$text</p>
    	// 		img - $img
    	// 	</div>
    	// ";

    	}

      phpQuery::unloadDocuments(); //выгружаем документ

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
    $request->session()->flash('status', 'Объявления добавлены в базу данных!');
    return redirect()->route('parser');
  }
}
