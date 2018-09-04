{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('name', __('Edit product'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($product, [
            'method' => 'PUT',
            'route'  => [
                'products.update',
                $product->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('products.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update product'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
