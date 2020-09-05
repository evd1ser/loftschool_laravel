@extends('layouts.app')

@section('content')
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
    </div>
    <div class="content-head__search-block">
    </div>
  </div>
  <div class="content-main__container">
    <div class="cart-product-list">
      @foreach($orders as $order)
        @php($product = $order->product)
        <div class="cart-product-list__item">
          <div class="cart-product__item__product-photo">
            <img src="{{$product->getFirstMediaUrl('cover')}}"
                 alt="{{$product->title}}"
                 class="cart-product__item__product-photo__image"
            ></div>
          <div class="cart-product__item__product-name">
            <div class="cart-product__item__product-name__content">
              @if($product->deleted_at)
                {{$product->title}}
                <small><small>(больше не доступно)</small></small>
              @else
                <a href="{{route('product.show', $product)}}">
                  {{$product->title}}
                </a>
              @endif

            </div>
          </div>
          <div class="cart-product__item__cart-date">
            <div class="cart-product__item__cart-date__content">{{$order->created_at->format('d.m.Y')}}</div>
          </div>
          <div class="cart-product__item__product-price">
            <span class="product-price__value">{{$product->price}} рублей</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  {{$orders->links('vendor.pagination.default')}}
@endsection
