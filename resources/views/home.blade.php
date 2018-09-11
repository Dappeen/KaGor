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

@php
  $productNumber = 0
@endphp

@foreach ($products as $product)
  @if ($productNumber == 0)
    <div class = "row">

    @php
      $productNumber++
    @endphp
  @endif

  @if ($productNumber > 0 && $productNumber < 4)
    <div class = "col-4">
  @endif

  @php
    $photo = $product->image->first();
  @endphp

  <div class = "row">
    <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-12">
      <a href = "{{ route('products.show', [$product->id]) }}">
        <img alt = "{{ $photo->id }}"
            src = "{{ asset('storage/images/'.$photo->path) }}"
            class = "img-responsive img-thumbnail">
      </a>
    </figure>
  </div>

  <div class = "row ml-4">
    <div class = "col-4">
      {{ $product->name }}
    </div>

    <div class = "col-8">
      {{
        Html::secureLink(
          route('products.edit', $product->id),
          __('Edit product')
        )
      }}
    </div>
  </div>

  <div class = "row ml-4">
    <div class = "col-4">
      {{ $product->price }}
    </div>

    <div class = "col-8">
      {{
        Html::secureLink(
          route('products.remove', $product->id),
          __('Remove product')
        )
      }}
    </div>
  </div>

  <div class = "row ml-4">
    <div class = "col-4">
      {{ $product->status->name }}
    </div>
  </div>
</div>

    @if ($productNumber == 3)
      </div>
      {% $productNumber++ %}
    @endif
  @endforeach
@endsection
