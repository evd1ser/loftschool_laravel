<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token"
        content="{{ csrf_token() }}"
  >
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"
          defer
  ></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible"
        content="IE=edge"
  >
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
  >
  <link rel="stylesheet"
        href="css/libs.min.css"
  >
  <link href="{{ mix('css/main.css') }}"
        rel="stylesheet"
  >
  <link rel="stylesheet"
        href="css/media.css"
  >
</head>
<body>

@section('content_top')
  <div class="content-top__text">
    {{Setting::get('main_description')}}
  </div>
  <div class="slider">
    <img src="/images/slider.png"
         alt="Image"
         class="image-main"
    >
  </div>
@endsection

<div class="main-wrapper">
  @include('layouts/header')
  <div class="middle">
    @include('layouts/sidebar')
    <div class="main-content">
      <div class="content-top">
        @yield('content_top')
      </div>

      <div class="content-middle">
        @yield('content')
      </div>

      <div class="content-bottom">
        @yield('content_bottom')
      </div>
    </div>
  </div>

  @include('layouts/footer')

  @auth
    <div class="remodal"
         id="modal-order"
    >
      <button data-remodal-action="close"
              class="remodal-close"
      ></button>
      <h1>Оформить заказ</h1>
      <p>Для оформления заказа оставьте свои данные менеджер свяжется с вами как только сможет (нет)</p>

      <form action='{{route('order.store')}}'
            method='post'
      >
        @csrf

        <input type='hidden'
               value=''
               id='order_product_id'
               required
               name='product_id'
        >
        <input type='hidden'
               value='{{auth()->user()->id}}'
               required
               name='user_id'
        >

        <label>
          <span>Имя</span>
          <input type='text'
                 name='name'
                 required
                 value='{{auth()->user()->name}}'
          >
        </label>
        <label>
          <span>Email</span>
          <input type='email'
                 name='email'
                 required
                 value='{{auth()->user()->email}}'
          >
        </label>
        <br>
        <br>
        <button data-remodal-action="cancel"
                class="remodal-cancel"
        >
          Отменить
        </button>
        <button class="remodal-confirm"
        >
          Заказать
        </button>
      </form>
    </div>
  @else
    <div class="remodal"
         id="modal-order"
    >
      <button data-remodal-action="close"
              class="remodal-close"
      ></button>
      <h1>Оформить заказ</h1>
      <p>Для оформления заказа необходимо:</p>

      @if (Route::has('register'))
        <a href="{{ route('register') }}"
           class="remodal-cancel"
        >{{ __('Register') }}</a>
      @endif

      <a href="{{ route('login') }}"
         class="remodal-confirm"
      >
        Авторизоваться
      </a>
    </div>
  @endauth

</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
