@extends('/layouts.app')

@section('title', 'Домовик')

@section('content')
<h1>Сообщения</h1>
  @foreach($data as $el)
    <div class="alert alert-info">
      <h3>{{ $el->name }} {{ $el->email}}</h3>
      <p>{{ $el->message}}</p>
      <p>{{ $el->created_at }}</p>
    </div>
  @endforeach
@endsection

@section('aside')
  @parent
  <p>дополнительный тескт</p>
@endsection
