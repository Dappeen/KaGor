{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции path родительского шаблона будет выведен перевод фразы: Edit photo --}}
@section('path', __('Remove photo'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: photos/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($photo, [
            'method' => 'DELETE',
            'route'  => [
                'photos.destroy',
                $photo->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $photo->title }}

    <div class="container-fluid">
        <div class="row">
          <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-1">
            <img alt = "{{ $photo->path }}" src = "{{ asset('storage/images/'.$photo->path) }}" class = "img-responsive img-thumbnail">
          </figure>
        </div>
    </div>

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove photo'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
