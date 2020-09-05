@extends('layouts.app')

@section('content')

  @if($category->id)
    <form action='{{route('category.update', $category)}}'
          method='post'
    >
      @method('put')
      @else
        <form action='{{route('category.store')}}'
              method='post'
        >
          @endif
          @csrf


          <label>
            <span>Название</span>
            <input type='text'
                   name='name'
                   required
                   value='{{old('name', $category->name)}}'
            >
          </label>
          <br>
          <label>
            <span>Описание</span>
            <textarea type='text'
                      required
                      name='description'
            >{{old('description', $category->description)}}</textarea>
          </label>
          <br>


          <button type='submit'>Сохранить</button>

        </form>
        @if($category->id)
          <form action='{{route('category.destroy', $category)}}' method='post'>
            @csrf
            @method('delete')

            <button>delete</button>

          </form>
        @endif
@endsection
