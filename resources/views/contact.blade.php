@extends('/layouts.app')

@section('title')
Контакты
@endsection

@section('content')
<h1>Контакты</h1>
<p>Ресурс недвижимости "Домовик" - один из крупнейших ресурсов поиска домов для покупки в стране.
Ежедневно наш ресурс помогает людям в выгодном и безопасном решении их вопросов, связанных с продажей, покупкой, арендой недвижимости.
Наша компания охватывает практически все направления и сегменты рынка, осуществляет все виды операций с недвижимостью
Сейчас в компании работает более 10 сотрудников, имеющих многолетний опыт работы и знания, которые помогают успешно решить любой вопрос в сфере недвижимости.
Более 5 лет компания гарантирует высокий уровень предоставляемых услуг, чем заслужила доверие клиентов и сейчас уверенно входит в список крупнейших агентств в стране.
</p>
<p>Отзывы нашик клиентов Вы можете прочитать в соответствующем разделе</p>
<a  href="{{route('feedback')}}"><button  class="btn btn-primary" type="button" name="button">
Читать отзывы
</button></a>
<br><br>
<h4>Если Вы уже воспользовалить нашими услугами, то можеть оставить свой отзыв:</h4>
<form class="" action="{{route('feedback-form')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Введите имя</label>
    <input type="text" name="name" id="name" value="" placeholder="имя" class="form-control">
  </div>

  <div class="form-group">
    <label for="email">Введите email</label>
    <input type="email" name="email" id="email" value="" placeholder="email" class="form-control">
  </div>

  <div class="form-group">
    <label for="message">Введите сообщение</label>
    <textarea name="message" id="message" class="form-control" rows="5" placeholder="сообщение"></textarea>

  </div>
  <button type="submit" name="button" class="btn btn-primary">Отправить</button>
</form>
@endsection
