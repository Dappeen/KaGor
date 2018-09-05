{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова content --}}
    {{ Form::label('Содержание', __('content')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('content', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{-- Метка к полю ввода цены товара --}}
    {{-- На метке будет выведен перевод слова product_id --}}
    {{ Form::label('Название товара', __('product_id')) }}

    {{-- Поле ввода цены товара --}}
    {{ Form::number('product_id', null, ['class' => 'form-control']) }}
</div>

