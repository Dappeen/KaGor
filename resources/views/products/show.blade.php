{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('name', __('Изменения названия товара'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<div class = "container">
  <div class = "center-block">
    @php
      $photo = $product->image->first();
    @endphp

    <div class = "row">
      <figure class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <img alt = "{{ $photo->id }}"
            src = "{{ asset('storage/images/'.$photo->path) }}"
            class = "img-responsive img-thumbnail">
      </figure>
    </div>
  </div>
</div>

<div class = "container-fluid">
  <div class = "row-12 m-3">
    {{
      Form::model($comment, [
          'method' => 'POST',
          'route' => 'comments.store',
      ])
    }}
    @include('comments.partials.form')
    {{
      Form::submit(
        __('Create comment'),
        [
          'class' => 'btn btn-block btn-success',
        ]
      )
    }}
  </div>

  <div class = "row">
    <div class = "col-4">
      Наименование товара:
      {{ $product->name }}
    </div>

    <div class = "col-4">
      Цена:
      {{ $product->price }}
    </div>

    <div class = "col-4">
      Описание товара:
      {{ $product->description }}
    </div>
  </div>
</div>

<div class = "container-fluid">
  <div class = "row">
    @foreach ($product->comments as $comment)
    <div class = "col-12 m-4">
      <div class = "row">
        Имя пользователя:
        {{ $comment->user->name }}
      </div>

      <div class = "row">
        Комментарий:
        {{ $comment->content }}
      </div>

      <div class = "row">
        Дата создания:
        {{ $comment->created_at }}
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
