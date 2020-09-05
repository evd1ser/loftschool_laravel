<div class="products-columns__item">
  <div class="products-columns__item__title-product">
    <a href="{{route('product.show',$product)}}"
       class="products-columns__item__title-product__link"
    >
      {{$product->title}}
    </a>
  </div>
  <div class="products-columns__item__thumbnail">
    <a href="{{route('product.show',$product)}}"
       class="products-columns__item__thumbnail__link"
    ><img
              src="{{$product->getFirstMediaUrl('cover')}}"
              alt="{{$product->title}}"
              class="products-columns__item__thumbnail__img"
      ></a>
  </div>
  <div class="products-columns__item__description">
    <span class="products-price">{{$product->price}} руб</span>
    <a href="#"
       data-product-id='{{$product->id}}'
       class="btn btn-blue js-create-order"
    >Купить
    </a>
  </div>
</div>
