@extends('layouts.app')

@section('content')
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Товары в разделе {{$category->name}}</div>
      </div>
      <div class="content-head__search-block">
      </div>
    </div>
    <div class="content-main__container">
      <p>
        {{$category->description}}
      </p>
      <div class="products-category__list">
        @foreach($products as $product)
          @include('shared.product')
        @endforeach
      </div>
    </div>
    {{$products->links('vendor.pagination.default')}}
  </div>
@endsection
