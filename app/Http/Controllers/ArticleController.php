<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use DateTime;
class ArticleController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    //получение GET параметров из формы фильтра объявлений
    $minPrice = (int)$request->input('minPrice');
    $maxPrice = (int)$request->input('maxPrice');
    $addDays = $request->input('addedDate');

    //сортировка по дате
    $curentDate = date("Y-m-d H:i:s");
    if(!empty($addDays)) {
      $objCurentDate = new DateTime($curentDate);
      $objCurentDate->modify("-{$addDays} day");
      $dateQuery = $objCurentDate->format("Y-m-d H:i:s");
      $addDays = $dateQuery;
    }

    $articles = Article::when($minPrice, function ($query, $minPrice) { //сработает если первый параметр true
      return $query->where('price', '>', $minPrice);
    })
    ->when($maxPrice, function ($query, $maxPrice) {
      return $query->where('price', '<', $maxPrice);
    })
    ->when($addDays, function ($query, $addDays) {
      return $query->whereDate('updateDate', '>', $addDays);
    })
    ->orderByDesc('id')
    ->Simplepaginate(21); //выбор всех объявлений с простой пагинацией
    // compact('articles') => [ 'articles' => $articles ]

    return view('article.index', compact('articles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function create()
  {
    $article = new Article();

    return view('article.create', compact('article'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(Request $request)
  {
    // Проверка введённых данных
    // Если будут ошибки, то возникнет исключение
    // Иначе возвращаются данные формы
    $data = $this->validate($request, [
      'title' => 'required',
      'price' => 'required',
      'phone' => 'required',
      'text' => 'required|min:10',
    ]);

    $article = new Article();
    // Заполнение статьи данными из формы
    $article->fill($data);
    $article->updateDate = date("Y-m-d H:i:s");
    $article->smallImage = [''];
    $article->bigImage = [''];
    // При ошибках сохранения возникнет исключение
    $article->save();

    // Редирект на указанный маршрут с добавлением флеш-сообщения
    $request->session()->flash('status', 'Объявление добавлено!');
    return redirect()->route('articles.create');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Article  $article
  * @return \Illuminate\Http\Response
  */
  public function show(Article $article)
  {
    return view('article.show', compact('article'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Article  $article
  * @return \Illuminate\Http\Response
  */
  public function edit(Article $article)
  {
    return view('article.edit', compact('article'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Article  $article
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Article $article)
  {
    $data = $this->validate($request, [
      // У обновления немного изменённая валидация. В проверку уникальности добавляется название поля и id текущего объекта
      // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
      'title' => 'required|min:5',
      'price' => 'required',
      'phone' => 'required',
      'text' => 'required|min:10',
    ]);

    $article->fill($data);
    $article->save();
    $request->session()->flash('status', 'Объявление обновлено!');
    return redirect()->route('articles.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Article  $article
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, Article $article)
  {
    //удаление в шаблонах с использованием @rails/ujs
    $article->delete();
    $request->session()->flash('status', 'Объявление удалено!');
    return redirect()->route('articles.index');
  }
}
