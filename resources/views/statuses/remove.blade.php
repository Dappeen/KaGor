{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit statuse --}}
@section('name', __('Remove statuse'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: statuses/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($statuse, [
            'method' => 'DELETE',
            'route'  => [
                'statuses.destroy',
                $statuse->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $statuse->title }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove statuse'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
