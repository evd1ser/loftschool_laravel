<footer class="footer">
  <div class="footer__footer-content">
    <div class="random-product-container">
      <div class="random-product-container__head">Случайный товар</div>
      <div class="random-product-container__content">
        @if($randomProduct)
          <div class="item-product">
            <div class="item-product__title-product">
              <a href="{{route('product.show', $randomProduct)}}"
                 class="item-product__title-product__link"
              >
                {{$randomProduct->title}}
              </a>
            </div>
            <div class="item-product__thumbnail">
              <a href="{{route('product.show', $randomProduct)}}"
                 class="item-product__thumbnail__link"
              >
                <img
                        src="{{$randomProduct->getFirstMediaUrl('cover')}}"
                        alt="{{$randomProduct->title}}"
                        class="item-product__thumbnail__link__img"
                >
              </a>
            </div>
            <div class="item-product__description">
              <div class="item-product__description__products-price">
                <span class="products-price">{{$randomProduct->price}} руб</span>
              </div>
              <div class="item-product__description__btn-block">
                <a href="{{route('product.show', $randomProduct)}}"
                   data-product-id='{{$randomProduct->id}}'
                   class="btn btn-blue js-create-order"
                >
                  Купить
                </a>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
    <div class="footer__footer-content__main-content">
      {!! Setting::get('footer_description') !!}
    </div>
  </div>
  <div class="footer__social-block">
    <ul class="social-block__list bcg-social">
      <li class="social-block__list__item">
        <a href="#"
           class="social-block__list__item__link"
        ><i
                  class="fa fa-facebook"
          ></i></a>
      </li>
      <li class="social-block__list__item">
        <a href="#"
           class="social-block__list__item__link"
        ><i
                  class="fa fa-twitter"
          ></i></a>
      </li>
      <li class="social-block__list__item">
        <a href="#"
           class="social-block__list__item__link"
        ><i
                  class="fa fa-instagram"
          ></i></a>
      </li>
    </ul>
  </div>
</footer>
