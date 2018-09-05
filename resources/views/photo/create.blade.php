{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции path родительского шаблона будет выведен перевод фразы: Create photo --}}
@section('path', __('Create photo'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут photos.create --}}
    {{
        Form::model($photo, [
            'method' => 'POST',
            'route'  => 'photos.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/photos/partials/form.blade.php --}}
    @include('photos.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save photo'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
