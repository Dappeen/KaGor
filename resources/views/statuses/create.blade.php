{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Create statuse --}}
@section('name', __('Create statuse'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут statuses.create --}}
    {{
        Form::model($statuse, [
            'method' => 'POST',
            'route'  => 'statuses.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/statuses/partials/form.blade.php --}}
    @include('statuses.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save statuse'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
