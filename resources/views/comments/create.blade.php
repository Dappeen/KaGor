{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции content родительского шаблона будет выведен перевод фразы: Create comment --}}
@section('content', __('Создание комментария'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут comments.create --}}
    {{
        Form::model($comment, [
            'method' => 'POST',
            'route'  => 'comments.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/comments/partials/form.blade.php --}}
    @include('comments.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
