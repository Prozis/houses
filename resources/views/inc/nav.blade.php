<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <img src="/favicon.ico" alt="Houses">
  <h5 class="my-0 mr-md-auto font-weight-normal">&nbsp Домовик</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="{{route('index')}}">Главная</a>
    <a class="p-2 text-dark" href="/articles">Объявления</a>
    <a class="p-2 text-dark" href="{{route('contact')}}">Контакты</a>
    <a class="p-2 text-dark" href="{{route('feedback')}}">Отзывы</a>
  @auth
    <a class="p-2 text-dark" href="{{route('parser')}}">Панель управления</a>
  @endauth

  </nav>


      <!-- Authentication Links -->
      @guest

              <a class="btn btn-outline-primary" href="{{ route('login') }}">{{ __('Login') }}</a>

          @if (Route::has('register'))

                  <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>

          @endif
      @else

              <a id="navbarDropdown" class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>

      @endguest


  <!-- <a class="btn btn-outline-primary" href="#">Регистрация</a> -->
</div>
