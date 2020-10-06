<aside class="aside">
  <h4>Параметры поиска:</h4>
      <form class="" action="/articles" method="GET">
        @csrf
        <div class="form-group">
          <p>цена</p>
          <label for=";">от</label>
          <input type="text" name="host" id="host" value="0" placeholder="" class="form-control">
          <label for=";">до</label>
          <input type="text" name="host" id="host" value="1000000" placeholder="" class="form-control">

        </div>

        <div class="form-group">
          Дата добавления
          <label for=";">от</label>
          <input type="text" name="host" id="host" value="0" placeholder="" class="form-control">
          <label for=";">до</label>
          <input type="text" name="host" id="host" value="1000000" placeholder="" class="form-control">

        </div>

        <button type="submit" name="button" class="btn btn-primary">Поиск</button>
      </form>
<br>
      <a  href="{{route('articles.create')}}"><button  class="btn btn-primary" type="button" name="button">
      Добавить объявление
      </button></a>
</aside>
