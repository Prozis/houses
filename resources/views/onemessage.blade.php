@extends('/layouts.app')

@section('title', 'Отзывы')

@section('content')

    <div class="alert alert-primary">
      <h3>{{ $data->name }} {{ $data->email}}</h3>
      <p>{{ $data->message}}</p>
      <p>{{ $data->created_at }}</p>
      @auth
        <a href="#">
          <button  class="btn btn-primary" type="button" name="button">
          Редактировать
        </button></a>
        <a href="#">
          <button  class="btn btn-primary" type="button" name="button">
          Удалить
        </button></a>
      @endauth
    </div>

@endsection
