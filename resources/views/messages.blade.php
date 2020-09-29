@extends('/layouts.app')

@section('title', 'Отзывы')

@section('content')
<h1>Отзывы</h1>
  @foreach($data as $el)
    <div class="alert alert-primary">
      <h3>{{ $el->name }} {{ $el->email}}</h3>
      <p>{{ $el->message}}</p>
      <p>{{ $el->created_at }}</p>
      <a href="{{route('showOneMessage', $el->id)}}">
        <button  class="btn btn-primary" type="button" name="button">
        Подробнее
      </button></a>

    </div>
  @endforeach
@endsection
