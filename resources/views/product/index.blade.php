@extends('layouts.app')

@section('content')

  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
    </div>
  </div>
  <div class="content-main__container">
    <div class="products-columns">
      @foreach($products as $product)
        @include('shared.product_home')
      @endforeach
    </div>
  </div>

  {{$products->links('vendor.pagination.default')}}
@endsection
