{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции content родительского шаблона будет выведен перевод фразы: Edit comment --}}
@section('content', __('Удаление комментария'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: comments/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($comment, [
            'method' => 'DELETE',
            'route'  => [
                'comments.destroy',
                $comment->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $comment->title }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
