{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit statuse --}}
@section('name', __('Edit statuse'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: statuses/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($statuse, [
            'method' => 'PUT',
            'route'  => [
                'statuses.update',
                $statuse->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/statuses/partials/form.blade.php --}}
    @include('statuses.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update statuse'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
