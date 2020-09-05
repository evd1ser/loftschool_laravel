@extends('layouts.app')

@section('content')

  <style>
    textarea,
    input {
      resize: none;
      display: block;
      width: 100%;
      margin-top: 20px;
    }
    textarea {
      height: 200px;
    }
  </style>

  <form action='{{route('settings.store')}}'
        method='post'
  >
    @csrf

    <label>
      <span>Телефон</span>
      <input type='text'
             name='phone'
             required
             value='{{old('phone', Setting::get('phone'))}}'
      >
    </label>
    <br>

    <label>
      <span>Admin email</span>
      <input type='text'
             name='admin_email'
             required
             value='{{old('admin_email', Setting::get('admin_email'))}}'
      >
    </label>
    <br>

    <label>
      <span>Описание в контентной части</span>
      <textarea type='text'
                required
                name='main_description'
      >{{old('main_description', Setting::get('main_description'))}}</textarea>
    </label>
    <br>

    <label>
      <span>Описание в подвале</span>
      <textarea type='text'
                required
                name='footer_description'
      >{{old('footer_description', Setting::get('footer_description'))}}</textarea>
    </label>
    <br>


    <button type='submit'>Сохранить</button>

  </form>
@endsection
