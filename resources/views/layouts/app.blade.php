<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  @include('inc.nav')
  @if(Request::is('/'))
    @include('inc.header')
  @endif

<div class="container">


  <div class="row">
    <div class="col-3">
      @if(Request::is('/'))
        @include('inc.aside')
      @endif
    </div>
    <div class="col-9">
        @include('inc.messages')
        @yield('content')
    </div>


  </div>

</div>


  @include('inc.footer')
</body>
</html>
