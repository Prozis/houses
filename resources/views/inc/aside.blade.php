<aside class="aside">
  <h4>Параметры поиска:</h4>
  <form class="" action="/articles" method="GET">
    @csrf
    <div class="form-group">
      <p>Цена</p>
      <label for="minPrice">от</label>
      <input type="text" name="minPrice" id="minPrice" value="" placeholder="" class="form-control">
      <label for="maxPrice">до</label>
      <input type="text" name="maxPrice" id="maxPrice" value="" placeholder="" class="form-control">

    </div>

    <div class="form-group">
      <p>Дата добавления</p>
      <input type="radio" id="today" name="addedDate" value="1">
      <label for="today">за сегодня</label><br>
      <input type="radio" id="3day" name="addedDate" value="3">
      <label for="all">за последние 3 дня</label><br>
      <input type="radio" id="week" name="addedDate" value="7">
      <label for="week">за неделю</label><br>
      <input type="radio" id="month" name="addedDate" value="30">
      <label for="month">за месяц</label>
    </div>

    <button type="submit" name="button" class="btn btn-primary">Поиск</button>
  </form>
  <br>
  @auth
  <a  href="{{route('articles.create')}}"><button  class="btn btn-primary" type="button" name="button">
    Добавить объявление
  </button></a>
  @endauth
</aside>
