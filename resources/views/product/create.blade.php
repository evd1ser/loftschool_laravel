@extends('layouts.app')

@section('content')

  @if($product->id)
    <form action='{{route('product.update', $product)}}'
          method='post'
    >
      @method('put')
      @else
        <form action='{{route('product.store')}}'
              method='post'
              enctype="multipart/form-data"
        >
          @endif
          @csrf

          <label>
            <span>Название</span>
            <input type='text'
                   name='title'
                   required
                   value='{{old('title', $product->title)}}'
            >
          </label>
          @include('shared.errors', ['name'=>'title'])
          <br>

          <label>
            <span>Категория</span>
            <select type='text'
                    name='category_id[]'
                    required
            >
              @foreach($categories as $category)
                <option value='{{$category->id}}'
                  @if($product->id)
                    @if(in_array($category->id, $product->categories->pluck('id')->toArray()))
                      selected
                    @endif
                  @endif
                >
                  {{$category->name}}
                </option>
              @endforeach
            </select>
          </label>
          @include('shared.errors', ['name'=>'category_id'])
          <br>
          <label>
            <span>Цена</span>
            <input type='text'
                   name='price'
                   required
                   value='{{old('price', $product->price)}}'
            >
          </label>
          @include('shared.errors', ['name'=>'price'])
          <br>

          <label>
            <span>Описание</span>
            <textarea type='text'
                      required
                      name='description'
            >{{old('description', $product->description)}}</textarea>
          </label>
          @include('shared.errors', ['name'=>'description'])
          <br>

          <label>
            <span>Изображение</span>
            <input type='file'
                   @if(!$product->id)
                   required
                   @endif
                   name='cover'
            >
          </label>
          @include('shared.errors', ['name'=>'cover'])
          <br>



          <button type='submit'>Сохранить</button>

          @if($product->id)
            <a href='{{route('product.show', $product)}}'>просмотреть</a>
          @endif

        </form>
        @if($product->id)
          <form action='{{route('product.destroy', $product)}}'
                method='post'
          >
            @csrf
            @method('delete')

            <button>delete</button>

          </form>
  @endif
@endsection
