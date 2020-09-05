<div class="sidebar">
  @auth
    @if(auth()->user()->is_admin)
      <div class="sidebar-item">
        <div class="sidebar-item__title">Админ</div>
        <div class="sidebar-item__content">
          <ul class="sidebar-category">
            <li class="sidebar-category__item">
              <a href="{{route('category.create')}}"
                 class="sidebar-category__item__link"
              >
                создать категорию
              </a>
            </li>
            <li class="sidebar-category__item">
              <a href="{{route('product.create')}}"
                 class="sidebar-category__item__link"
              >
                создать товар
              </a>
            </li>
            <li class="sidebar-category__item">
              <a href="{{route('settings.index')}}"
                 class="sidebar-category__item__link"
              >
                Настройки сайта
              </a>
            </li>
          </ul>
        </div>
      </div>
    @endif
  @endauth
  <div class="sidebar-item">
    <div class="sidebar-item__title">Категории</div>
    <div class="sidebar-item__content">
      <ul class="sidebar-category">
        @foreach($categories as $category)
          <li class="sidebar-category__item">
            <a href="{{route('category.show', $category)}}"
               class="sidebar-category__item__link"
            >
              {{$category->name}}
            </a>
            @auth
              @if(auth()->user()->is_admin)
                <a href='{{route('category.edit', $category)}}'>edit</a>
              @endif
            @endauth
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  {{--
  <div class="sidebar-item">
    <div class="sidebar-item__title">Последние новости</div>
    <div class="sidebar-item__content">
      <div class="sidebar-news">
        <div class="sidebar-news__item">
          <div class="sidebar-news__item__preview-news"><img src="images/cover/game-2.jpg"
                                                             alt="image-new"
                                                             class="sidebar-new__item__preview-new__image"
            ></div>
          <div class="sidebar-news__item__title-news">
            <a href="#"
               class="sidebar-news__item__title-news__link"
            >О новых играх в режиме VR
            </a>
          </div>
        </div>
        <div class="sidebar-news__item">
          <div class="sidebar-news__item__preview-news"><img src="images/cover/game-1.jpg"
                                                             alt="image-new"
                                                             class="sidebar-new__item__preview-new__image"
            ></div>
          <div class="sidebar-news__item__title-news">
            <a href="#"
               class="sidebar-news__item__title-news__link"
            >О новых играх в режиме VR
            </a>
          </div>
        </div>
        <div class="sidebar-news__item">
          <div class="sidebar-news__item__preview-news"><img src="images/cover/game-4.jpg"
                                                             alt="image-new"
                                                             class="sidebar-new__item__preview-new__image"
            ></div>
          <div class="sidebar-news__item__title-news">
            <a href="#"
               class="sidebar-news__item__title-news__link"
            >О новых играх в режиме VR
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  --}}
</div>
