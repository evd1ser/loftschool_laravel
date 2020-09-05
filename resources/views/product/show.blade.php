@extends('layouts.app')

@section('content')
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">
        {{$product->title}}
      </div>
    </div>
  </div>
  <div class="content-main__container">
    <div class="product-container">
      <div class="product-container__image-wrap">
        <img src="{{$product->getFirstMediaUrl('cover')}}"
             class="image-wrap__image-product"
        >
      </div>
      <div class="product-container__content-text">
        <div class="product-container__content-text__title">
          {{$product->title}}
          @auth
            @if(auth()->user()->is_admin)
              <small>
                <small>
                  <small>
                    <a href='{{route('product.edit', $product)}}'>Редактировать</a>
                    <form action='{{route('product.destroy',$product)}}'
                          method='post'
                    >
                      @csrf
                      @method('delete')
                      <button>Удалить</button>
                    </form>
                  </small>
                </small>
              </small>
            @endif
          @endauth
        </div>
        <div class="product-container__content-text__price">
          <div class="product-container__content-text__price__value">
            Цена: <b>{{$product->price}}</b>
            руб
          </div>
          <a href="#"
             class="btn btn-blue"
          >Купить
          </a>
        </div>
        <div class="product-container__content-text__description">
          {!! $product->description !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content_bottom')
  <div class="line"></div>
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
    </div>
  </div>
  <div class="content-main__container">
    <div class="products-columns">
      @foreach($recomends as $product)
        <div class="products-columns__item">
          <div class="products-columns__item__title-product">
            <a href="{{route('product.show', $product)}}"
               class="products-columns__item__title-product__link"
            >
              {{$product->title}}
            </a>
          </div>
          <div class="products-columns__item__thumbnail">
            <a href="{{route('product.show', $product)}}"
               class="products-columns__item__thumbnail__link"
            >
              <img src="{{$product->getFirstMediaUrl('cover')}}"
                   alt="Preview-image"
                   class="products-columns__item__thumbnail__img"
              >
            </a>
          </div>
          <div class="products-columns__item__description">
            <span class="products-price">{{$product->price}} руб</span>
            <a href="{{route('product.show', $product)}}"
               data-product-id='{{$product->id}}'
               class="btn btn-blue js-create-order"
            >
              Купить
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
