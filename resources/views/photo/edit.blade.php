{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции path родительского шаблона будет выведен перевод фразы: Edit photo --}}
@section('path', __('Edit photo'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: photos/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($photo, [
            'method' => 'PUT',
            'route'  => [
                'photos.update',
                $photo->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/photos/partials/form.blade.php --}}
    @include('photos.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update photo'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
