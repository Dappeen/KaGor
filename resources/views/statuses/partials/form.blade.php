{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова name --}}
    {{ Form::label('name', __('Название')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>


