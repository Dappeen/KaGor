{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Name --}}
    {{ Form::label('name', __('Name')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода цены товара --}}
    {{-- На метке будет выведен перевод слова Price --}}
    {{ Form::label('price', __('Price')) }}

    {{-- Поле ввода цены товара --}}
    {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Name --}}
    {{ Form::label('description', __('Description')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
