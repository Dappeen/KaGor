{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова path --}}
    {{ Form::label('Путь', __('path')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::file('path', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода цены товара --}}
    {{-- На метке будет выведен перевод слова product_id --}}
    {{ Form::label('Название товара', __('product_id')) }}

    {{-- Поле ввода цены товара --}}
    {{ Form::select('product_id', $products, ['class' => 'form-control']) }}
</div>
