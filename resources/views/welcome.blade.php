@extends('layouts.app')

@section('content')
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
    </div>
  </div>
  <div class="content-main__container">
    <div class="products-columns">
      @include('shared.product_home')
    </div>
  </div>
  <div class="content-footer__container">
    <ul class="page-nav">
      <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a>
      </li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
      <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
      </li>
    </ul>
  </div>
@endsection
