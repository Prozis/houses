<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles = Article::paginate();

      // Статьи передаются в шаблон
      // compact('articles') => [ 'articles' => $articles ]
      //return view('article.index', compact('articles'));
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
        'text' => 'required|min:10',
      ]);

      $article = new Article();
      // Заполнение статьи данными из формы
      $article->fill($data);
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
        'title' => 'required|unique:articles,title,' . $article->id,
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
    public function destroy(Article $article)
    {
      $article->delete();
      return redirect()->route('articles.index');
    }
}
