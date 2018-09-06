{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции content родительского шаблона будет выведен перевод фразы: Edit comment --}}
@section('content', __('Изменение комментария'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: comments/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($comment, [
            'method' => 'PUT',
            'route'  => [
                'comments.update',
                $comment->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/comments/partials/form.blade.php --}}
    @include('comments.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
