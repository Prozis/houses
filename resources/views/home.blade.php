@extends('/layouts.app')

@section('title', 'Дома')

@section('content')
<h1>main page</h1>
@endsection

@section('aside')
  @parent
  <p>дополнительный тескт</p>
@endsection
