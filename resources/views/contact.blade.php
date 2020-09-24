@extends('/layouts.app')

@section('title')
Контакты-Домовик
@endsection

@section('content')
<h1>Контакты</h1>
<p>contact</p>


<form class="" action="{{route('contact-form')}}" method="post">
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
    <textarea name="message" id="message" class="form-control" placeholder="сообщение"></textarea>

  </div>
  <button type="submit" name="button" class="btn btn-success">Отправить</button>
</form>
@endsection
