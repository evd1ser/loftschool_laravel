@if ($paginator->hasPages())

  <div class="content-footer__container">
    <ul class="page-nav">
      @if ($paginator->onFirstPage())
        <li class="page-nav__item"
            aria-disabled="true"
            aria-label="@lang('pagination.previous')"
        >
          <i class="fa fa-angle-double-left"></i>
        </li>
      @else
        <li class="page-nav__item">
          <a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a>
        </li>
      @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <li class="page-nav__item"
                aria-disabled="true"
            ><span>{{ $element }}</span></li>
          @endif

          {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                <li class="page-nav__item"><span class="page-nav__item__link">{{ $page }}</span></li>
              @else
                <li class="page-nav__item"><a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a></li>
              @endif
            @endforeach
          @endif
        @endforeach


        @if ($paginator->hasMorePages())
          <li class="page-nav__item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
          </li>
        @else
          <li class="page-nav__item">
            <i class="fa fa-angle-double-right"></i>
          </li>
        @endif


    </ul>
  </div>
@endif
