{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции path родительского шаблона будет выведен перевод фразы: photos --}}
@section('path', __('photos'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('photos.create'),
                __('Create photo')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('path') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($photos as $photo)
                <tr>
                    <td>{{ $photo->path }}</td>
                    <td>{{ Html::secureLink(
                        route('photos.edit', $photo->id),
                        __('Edit photo')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('photos.remove', $photo->id),
                        __('Remove photo')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
