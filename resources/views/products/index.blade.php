{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Products --}}
@section('name', __('Products'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('products.create'),
                __('Create product')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Status') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                      @foreach ($statuses as $status)
                        @if ($status->id == $product->statuses_id)
                          {{ $status->name }}
                        @endif
                      @endforeach
                    </td>
                    <td>{{ Html::secureLink(
                        route('products.edit', $product->id),
                        __('Edit product')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('products.remove', $product->id),
                        __('Remove product')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
