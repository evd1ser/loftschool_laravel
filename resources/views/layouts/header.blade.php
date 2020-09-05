<header class="main-header">
  <div class="logotype-container">
    <a href="#"
       class="logotype-link"
    >
      <img src="/images/logo.png"
           alt="Логотип"
      >
    </a>
  </div>
  <nav class="main-navigation">
    <ul class="nav-list">
      <li class="nav-list__item">
        <a href="/"
           class="nav-list__item__link"
        >
          Главная
        </a>
      </li>
      @auth
        <li class="nav-list__item">
          <a href="{{route('order.index')}}"
             class="nav-list__item__link"
          >
            Мои заказы
          </a>
        </li>
        @if(auth()->user()->is_admin)
          <li class="nav-list__item">
            <a href="{{route('order.admin')}}"
               class="nav-list__item__link"
            >
              Все заказы
            </a>
          </li>
        @endif
      @endauth
    </ul>
  </nav>
  <div class="header-contact">
    <div class="header-contact__phone">
      <a href="tel:{{Setting::get('phone')}}"
         class="header-contact__phone-link"
      >
        Телефон: {{Setting::get('phone')}}
      </a>
    </div>
  </div>
  <div class="header-container">
    <div class="payment-container">
      <div class="payment-basket__status">
        <div class="payment-basket__status__icon-block">
          <a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a>
        </div>
        <div class="payment-basket__status__basket">
          <span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span>
        </div>
      </div>
    </div>

    @guest
      <div class="authorization-block">
        @if (Route::has('register'))
          <a href="{{ route('register') }}"
             class="authorization-block__link"
          >{{ __('Register') }}</a>
        @endif
        <a href="{{ route('login') }}"
           class="authorization-block__link"
        >{{ __('Login') }}</a>
      </div>
    @else
      <a class="authorization-block__link">
        {{ Auth::user()->name }}
      </a>

      <a class="authorization-block__link"
         href="{{ route('logout') }}"
         onclick="event.preventDefault();document.getElementById('logout-form').submit();"
      >
        {{ __('Logout') }}
      </a>

      <form id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            class="d-none"
      >
        @csrf
      </form>
    @endguest
  </div>
</header>
